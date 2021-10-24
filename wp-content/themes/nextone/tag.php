<?php
get_header();
get_template_part('./components/breadcrums');
$tag = get_queried_object();
?>
<section class="blog__category">
    <?php
    $sliders = get_field('background_images', $tag);
    if ($sliders) :
    ?>
        <div class="owl-carousel owl-theme blog__category__sliders pc goteffect">
            <?php
            foreach ($sliders as $slide) :
            ?>
                <div class="lazy blog__category__slideitem" data-bg="<?php echo $slide['image']['url'] ?>"></div>
            <?php
            endforeach;
            ?>
        </div>
        <div class="owl-carousel owl-theme blog__category__sliders mb goteffect">
            <?php
            foreach ($sliders as $slide) :
            ?>
                <div class="lazy blog__category__slideitem" data-bg="<?php echo $slide['image_mb']['url'] ?>"></div>
            <?php
            endforeach;
            ?>
        </div>
    <?php
    endif;
    ?>
</section>
<section class="blog__category">
    <div class="container">
        <div class="common__bortit">
            <h1 class="blog__category__title common__bortit--tit"><?php echo $tag->name ?></h1>
        </div>
        <?php
        global $wp_query, $wp;
        $lang = get_bloginfo("language");
        $wp_query->set('posts_per_page', 12);
        $paged = get_query_var('paged');
        $args = array(
            'posts_per_page' => 52,
            'post_type' => 'blog',
            'post_status' => 'publish',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'paged' => $paged,
            'tag' => $tag->slug
        );
        $posts = get_posts($args);
        if ($posts) :
            echo "<div class='blog__category__list'>";
            foreach ($posts as $post) : setup_postdata($post);
                $image_id = get_field('image');
                $image = wp_get_attachment_image_src($image_id, 'medium');
        ?>
                <a href="<?php the_permalink() ?>" class="blog__category__item" title="<?php the_title() ?> goteffect">
                    <div class="blog__category__item--thumbbox">
                        <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" class="lazy blog__category__list--thumb" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    </div>
                    <h3 class="blog__category__item--tit"><?php the_title() ?></h3>
                    <?php echo the_excerpt(); ?>
                    <span class="blog__category__item--readmore"><?php _e('xem thêm', 'lavo'); ?></span>
                </a>
        <?php
            endforeach;
            echo "</div>";
            if (function_exists('wp_paginate')) :
                wp_paginate();
            endif;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php
get_footer();
?>