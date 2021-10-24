<?php
function video_post_type()
{


    $label = array(
        'name' => __('Video', 'lavo'),
        'singular_name' => __('Bài Viết', 'lavo')
    );

    $args = array(
        'labels' => $label,
        'description' =>  __('Post type video', 'lavo'),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields',
            'post-format'
        ),
        'show_in_rest' => true,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-video',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => array(
            'slug' => '.',
            'with_front' => false
        )

    );

    register_post_type('video', $args);

    $taxonomylabels = array(
        'name' => _x('Loại Video', 'Loại video'),
        'singular_name' => _x('Loại Video', 'Loại video'),
        'search_items' => __('Tìm loại Video', 'lavo'),
        'all_items' => __('Tất cả loại Video', 'lavo'),
        'edit_item' => __('Sửa loại Video', 'lavo'),
        'add_new_item' => __('Thêm loại mới', 'lavo'),
        'menu_name' => __('Loại Video', 'lavo'),
    );
    $args = array(
        'labels' => $taxonomylabels,
        'show_ui'           => true,
        'hierarchical'      => true,
        'show_in_rest' => true,
    );
    register_taxonomy('video-category', 'video', $args);
}


add_action('init', 'video_post_type');

add_filter('request', 'rudr_change_video_category_request', 1, 1);

function rudr_change_video_category_request($query)
{

    $tax_name = 'video-category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'

    // Request for child terms differs, we should make an additional check
    if (isset($query['attachment'])) :
        $include_children = true;
        $name = $query['attachment'];
    else :
        $include_children = false;
        $name = $query['name'] ?? null;
    endif;


    $term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists

    if (isset($name) && $term && !is_wp_error($term)) : // check it here

        if ($include_children) {
            unset($query['attachment']);
            $parent = $term->parent;
            while ($parent) {
                $parent_term = get_term($parent, $tax_name);
                $name = $parent_term->slug . '/' . $name;
                $parent = $parent_term->parent;
            }
        } else {
            unset($query['name']);
        }

        switch ($tax_name):
            case 'category': {
                    $query['category_name'] = $name; // for categories
                    break;
                }
            case 'post_tag': {
                    $query['tag'] = $name; // for post tags
                    break;
                }
            default: {
                    $query[$tax_name] = $name; // for another taxonomies
                    break;
                }
        endswitch;

    endif;

    return $query;
}


add_filter('term_link', 'rudr_video_category_permalink', 10, 3);

function rudr_video_category_permalink($url, $term, $taxonomy)
{

    $taxonomy_name = 'video-category'; // your taxonomy name here
    $taxonomy_slug = 'video-category'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )

    // exit the function if taxonomy slug is not in URL
    if (strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name) return $url;

    $url = str_replace('/' . $taxonomy_slug, '', $url);

    return $url;
}


function div_wrapper($content)
{
    // match any iframes
    /*$pattern = '~<iframe.*</iframe>|<embed.*</embed>~'; // Add it if all iframe*/
    $pattern = '~<iframe.*src=".*(youtube.com|youtu.be).*</iframe>|<embed.*</embed>~'; //only iframe youtube
    preg_match_all($pattern, $content, $matches);
    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="videoWrapper">' . $match . '</div>';
        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }
    return $content;
}
add_filter('the_content', 'div_wrapper');

// Creating the widget 
class video_related_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'video_related_widget',

            // Widget name will appear in UI
            __('Video Related', 'lavo'),

            // Widget description
            array('description' => __('Video post by category', 'lavo'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        global $post, $blog_should;
        $title = apply_filters('common__sidebar__tit', $instance['title']);
        if ($instance['video_category_id'] > 0) :
            $params = array(
                'posts_per_page' => '12',
                'post_type' => 'video',
                'post_status' => 'publish',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'video-category',
                        'field' => 'id',
                        'terms' => $instance['video_category_id'],
                    )
                )
            );
            if ($blog_should) :
                $exclude_ids = array_column($blog_should, 'ID');
                $exclude_ids[] = $post->ID;
                $params['post__not_in'] = $exclude_ids;
            else :
                if ($post) $params['post__not_in'] = array($post->ID);
            endif;
            $video = get_posts($params);
            if ($video) :
                echo $args['before_widget'];
                if (!empty($title)) echo $args['before_title'] . $title . $args['after_title'];
                foreach ($video as $post) : setup_postdata($post);
                    $video = get_field('url', $post->ID);
                    $video_thumb = get_field('video_thumb', $post->ID);
                    $video_title = get_the_title($post->ID);
?>
                    <div class="common__sidebar__flex">
                        <a href="<?php the_permalink($post->ID) ?>" title="<?php echo $video_title ?>" class="common__sidebar__flex--imground video__thumb">
                            <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $video_thumb ?>" class="lazy common__sidebar__flex--img" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        </a>
                        <div class="common__sidebar__flex--des">
                            <a href="<?php the_permalink($post->ID) ?>" title="<?php echo $video_title ?>">
                                <h4 class="common__sidebar__flex--subtit"><?php echo $video_title ?></h4>
                            </a>
                            <time datetime="<?php echo get_the_date('Y-m-d h:m') ?>" class="common__sidebar__flex--time"><?php echo get_the_date('d-m-Y') ?></time>
                        </div>
                    </div>
        <?php
                endforeach;
                echo $args['after_widget'];
            endif;
            wp_reset_postdata();
        endif;
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'lavo');
        }
        if (isset($instance['video_category_id'])) {
            $video_category_id = $instance['video_category_id'];
        } else {
            $video_category_id = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('video_category_id'); ?>"><?php _e('Category ID:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('video_category_id'); ?>" name="<?php echo $this->get_field_name('video_category_id'); ?>" type="text" value="<?php echo esc_attr($video_category_id); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['video_category_id'] = (!empty($new_instance['video_category_id'])) ? strip_tags($new_instance['video_category_id']) : '';
        return $instance;
    }
}
function add_video_load_widget()
{
    register_widget('video_related_widget');
}
add_action('widgets_init', 'add_video_load_widget');
