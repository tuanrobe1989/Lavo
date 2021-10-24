<?php
function block_post_type()
{
 

    $label = array(
        'name' => __('Block Content','lavo'), 
        'singular_name' => __('Block Content','lavo')
    );
 
    $args = array(
        'labels' => $label, 
        'description' =>  __('Post type block content','lavo'),
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
        'public' => false, 
        'show_ui' => true, 
        'show_in_menu' => true, 
        'show_in_nav_menus' => true, 
        'show_in_admin_bar' => true, 
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-tickets-alt', 
        'can_export' => true, 
        'has_archive' => false, 
        'exclude_from_search' => false, 
        'publicly_queryable' => true, 
        'rewrite' => array(
            'slug' => '',
            'with_front' => false
        )
 
    );
 
    register_post_type('blockcontent', $args); 
 
}

add_action('init', 'block_post_type');



add_shortcode('about_block_map','about_block_map');
function about_block_map($atts){
    $post_id = $atts['id'];
    $class = $atts['class'];
    $post = get_post($post_id);
    $image = get_field('about_map_left_image',$post_id);
    $background_color = get_field('background_color',$post_id);
    $max_width = $atts['max_width'];
    ob_start();
    ?>
    <section <?php if($background_color) echo 'style="background-color: '.$background_color.'"' ?> class="lazy goteffect about__map__main">
        <div class="container about__map__container" <?php if($max_width) echo 'style="max-width: '.$max_width.'px"' ?>>
            <div class="<?php echo $class ?>">
                <div class="about__map__item goteffect">
                    <img src="<?php echo CUS_PATH ?>/images/no-image.png" data-src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']?>" title="<?php echo $image['title'] ?>" class="lazy about__map__item--thumb"/>
                </div>
                <div class="about__map__item goteffect"><?php echo apply_filters('the_content',$post->post_content) ?></div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('lavo_paralax','lavo_paralax');
function lavo_paralax($atts){
    $post_id = $atts['id'];
    $class = $atts['class'];
    $post = get_post($post_id);
    $background_image = get_field('background_image',$post_id);
    $max_width = $atts['max_width'];
    ob_start();
    ?>
    <section data-bg="<?php echo $background_image; ?>" class="lazy <?php  echo $class ?> goteffect">
        <div class="container" <?php if($max_width) echo 'style="max-width: '.$max_width.'px"' ?>>
            <?php echo apply_filters('the_content',$post->post_content) ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('lavo_history','lavo_history');
function lavo_history ($atts){
    $post_id = $atts['id'];
    $post = get_post($post_id);
    $title = $atts['title'];
    $tag = $atts['tag'];
    $background_image = get_field('background_image',$post_id);
    ob_start();
    ?>
    <section class="about__history lazy goteffect"  data-bg="<?php echo $background_image; ?>">
        <div class="container">
            <<?php echo $tag ?> class="about__history__title goteffect"><?php echo $title ?></<?php echo $tag ?>>
            <div class="about__history__around">
                <div class="about__history__item goteffect">
                    <div class="about__history__images owl-carousel owl-theme">
                        <?php 
                            if( have_rows('about_history_images',$post->ID) ):
                                while( have_rows('about_history_images',$post->ID) ) : the_row();
                                    $image = get_sub_field('image');
                                    ?>
                                        <img src="<?php echo CUS_PATH ?>/images/no-image.png" data-src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>" class="lazy" />
                                    <?php
                                endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                </div>
                <div class="about__history__item goteffect">
                    <?php echo apply_filters('the_content',$post->post_content) ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}


add_shortcode('lavo_values','lavo_values');
function lavo_values ($atts){
    $post_id = $atts['id'];
    $post = get_post($post_id);
    $background_color = get_field('background_color',$post_id);
    ob_start();
    ?>
    <section class="about__value goteffect" <?php if($background_color) echo 'style="background-color: '.$background_color.'"' ?>>
        <div class="container">
            <?php echo apply_filters('the_content',$post->post_content) ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('lavo_award','lavo_award');
function lavo_award ($atts){
    $post_id = $atts['id'];
    $post = get_post($post_id);
    $background_color = get_field('background_color',$post_id);
    ob_start();
    ?>
    <section class="about__award goteffect"  <?php if($background_color) echo 'style="background-color: '.$background_color.'"' ?>>
        <div class="container">
            <div class="about__award__around">
                <div class="about__award__item goteffect">
                    <div class="about__award__images owl-carousel owl-theme">
                        <?php 
                            if( have_rows('about_award_images',$post->ID) ):
                                while( have_rows('about_award_images',$post->ID) ) : the_row();
                                    $image = get_sub_field('image');
                                    ?>
                                        <img src="<?php echo CUS_PATH ?>/images/no-image.png" data-src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>" class="lazy" />
                                    <?php
                                endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                </div>
                <div class="about__award__item goteffect">
                    <?php echo apply_filters('the_content',$post->post_content) ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}


add_shortcode('lavo_factory','lavo_factory');
function lavo_factory ($atts){
    $post_id = $atts['id'];
    $post = get_post($post_id);
    $background_image = get_field('background_image',$post_id);
    ob_start();
    ?>
    <section class="about__factory goteffect">
        <div class="about__factory__bg lazy goteffect" data-bg="<?php echo $background_image ?>">
        </div>
        <div class="container">
            <div class="about__factory__list">
                <div class="about__factory__item goteffect">
                    <span class="about__factory__item--empty"></span>
                </div>
                <div class="about__factory__item goteffect">
                    <?php echo apply_filters('the_content',$post->post_content) ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('lavo_career','lavo_career');
function lavo_career ($atts){
    $post_id = $atts['id'];
    $post = get_post($post_id);
    $background_image = get_field('background_image',$post_id);
    ob_start();
    ?>
    <section class="about__career goteffect">
        <div class="container">
        <img src="<?php echo CUS_PATH ?>/images/no-image.png" data-src="<?php echo $background_image ?>" alt="nhân sự" title="nhân sự" class="lazy about__career__thumb goteffect"/>
        <?php echo apply_filters('the_content',$post->post_content) ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}