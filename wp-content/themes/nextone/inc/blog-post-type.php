<?php
add_image_size('blog-size-medium', 700, 430, true);
add_image_size('blog-size-small', 450, 280, true);
function blog_post_type()
{


    $label = array(
        'name' => __('Tin Tức', 'lavo'),
        'singular_name' => __('Bài Viết', 'lavo')
    );

    $args = array(
        'labels' => $label,
        'description' =>  __('Post type tin tức', 'lavo'),
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
        'menu_icon' => 'dashicons-format-aside',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => array(
            'slug' => '.',
            'with_front' => false
        )

    );

    register_post_type('blog', $args);

    $taxonomylabels = array(
        'name' => _x('Loại Tin Tức', 'Loại sản phẩm của blog', 'lavo'),
        'singular_name' => _x('Loại Tin Tức', 'Loại sản phẩm của blog', 'lavo'),
        'search_items' => __('Tìm loại Tin Tức', 'lavo'),
        'all_items' => __('Tất cả loại Tin Tức', 'lavo'),
        'edit_item' => __('Sửa loại Tin Tức', 'lavo'),
        'add_new_item' => __('Thêm loại mới', 'lavo'),
        'menu_name' => __('Loại Tin Tức', 'lavo'),
    );
    $args = array(
        'labels' => $taxonomylabels,
        'show_ui'           => true,
        'hierarchical'      => true,
        'show_in_rest' => true,
    );
    register_taxonomy('blog-category', 'blog', $args);

    register_taxonomy_for_object_type('post_tag', 'blog');
}


add_action('init', 'blog_post_type');

add_filter('request', 'rudr_change_blog_category_request', 1, 1);

function rudr_change_blog_category_request($query)
{

    $tax_name = 'blog-category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'

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


add_filter('term_link', 'rudr_blog_category_permalink', 10, 3);

function rudr_blog_category_permalink($url, $term, $taxonomy)
{

    $taxonomy_name = 'blog-category'; // your taxonomy name here
    $taxonomy_slug = 'blog-category'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )

    // exit the function if taxonomy slug is not in URL
    if (strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name) return $url;

    $url = str_replace('/' . $taxonomy_slug, '', $url);

    return $url;
}


// Creating the widget 
class blogs_related_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'blogs_related_widget',

            // Widget name will appear in UI
            __('Blogs Related', 'lavo'),

            // Widget description
            array('description' => __('Blog post by category', 'lavo'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        global $post, $blog_should;
        $title = apply_filters('common__sidebar__tit', $instance['title']);
        if ($instance['blog_category_id'] > 0) :
            $params = array(
                'posts_per_page' => '12',
                'post_type' => 'blog',
                'post_status' => 'publish',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'blog-category',
                        'field' => 'id',
                        'terms' => $instance['blog_category_id'],
                    )
                )
            );
            if ($instance['blog_category_id'] != 167) :
            endif;
            if ($blog_should) :
                $exclude_ids = array_column($blog_should, 'ID');
                $exclude_ids[] = $post->ID;
                $params['post__not_in'] = $exclude_ids;
            else :
                if ($post) $params['post__not_in'] = array($post->ID);
            endif;

            $blogs = get_posts($params);
            if ($blogs) :
                echo $args['before_widget'];
                if (!empty($title)) echo $args['before_title'] . $title . $args['after_title'];
                foreach ($blogs as $post) : setup_postdata($post);
                    $image_id = get_field('image', $post->ID);
                    $image = wp_get_attachment_image_src($image_id, 'blog-thumb-right');
                    $blog_title = get_the_title($post->ID);
?>
                    <div class="common__sidebar__flex">
                        <a href="<?php the_permalink($post->ID) ?>" title="<?php echo $blog_title ?>" class="common__sidebar__flex--imground">
                            <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" alt="<?php echo $blog_title ?>" title="<?php echo $blog_title ?>" class="lazy common__sidebar__flex--img" />
                        </a>
                        <div class="common__sidebar__flex--des">
                            <a href="<?php the_permalink($post->ID) ?>" title="<?php echo $blog_title ?>">
                                <h4 class="common__sidebar__flex--subtit"><?php echo $blog_title ?></h4>
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
        if (isset($instance['blog_category_id'])) {
            $blog_category_id = $instance['blog_category_id'];
        } else {
            $blog_category_id = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('blog_category_id'); ?>"><?php _e('Category ID:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('blog_category_id'); ?>" name="<?php echo $this->get_field_name('blog_category_id'); ?>" type="text" value="<?php echo esc_attr($blog_category_id); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['blog_category_id'] = (!empty($new_instance['blog_category_id'])) ? strip_tags($new_instance['blog_category_id']) : '';
        return $instance;
    }
}
function wpb_load_widget()
{
    register_widget('blogs_related_widget');
}
add_action('widgets_init', 'wpb_load_widget');


add_filter('init', 'add_author_more_query_var');
function add_author_more_query_var()
{
    global $wp;
    add_rewrite_rule(
        '(.+?)/trang/?([0-9]{1,})/?$',
        'index.php?blog-category=$matches[1]&trang=$matches[2]',
        'top'
    );
}

add_filter('query_vars', function ($vars) {
    $vars[] = "trang";
    return $vars;
});

//HTML for blog related - blog_related hook in single-blog.php file
add_action('blog_related', 'blog_related_func');
function blog_related_func()
{
    get_template_part('components/blog-related');
}

//HTML Output for Suggestion Pop-up product_size
add_action('product_suggestion', 'product_suggestion_popup_func');
function product_suggestion_popup_func()
{
    get_template_part('components/product-suggestion');
}
