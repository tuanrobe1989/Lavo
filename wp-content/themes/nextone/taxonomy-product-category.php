<?php 
    get_header(); 
    get_template_part('./components/breadcrums');
?>
<section class="product__category">
<?php 
    $term = get_queried_object();
    $sliders = get_field('background_images',$term);
    if($sliders):
?>
<div class="owl-carousel owl-theme product__category__sliders pc goteffect">
    <?php 
        foreach($sliders as $slide):
    ?>
        <div class="lazy product__category__slideitem" data-bg="<?php echo $slide['image']['url'] ?>"></div>
    <?php 
        endforeach;
    ?>
</div>
<div class="owl-carousel owl-theme product__category__sliders mb goteffect">
    <?php 
        foreach($sliders as $slide):
    ?>
        <div class="lazy product__category__slideitem" data-bg="<?php echo $slide['image_mb']['url'] ?>"></div>
    <?php 
        endforeach;
    ?>
</div>
<?php 
    endif;
?>
</section>
<section class="product__list">
    <div class="container">
        <h1 class="product__list__title  product__detail__related--des goteffect"><?php echo $term->name ?></h1>
        <?php 
            global $wp_query,$wp;
            $wp_query->set('posts_per_page', 12);
            $paged = get_query_var('paged');
            $args = array(
                'numberposts' => 12,
                'post_type' => 'product',
                'post_status' => 'publish',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'paged' => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product-category',
                        'field'    => 'slug',
                        'terms'    => $term->slug
                    )
                )
            );
            $posts = get_posts( $args );
            if ( $posts ): 
                echo "<div class='product__list__flex'>";
                foreach ( $posts as $post ) : setup_postdata( $post );
                    $image_id = get_field('image');
                    $image = wp_get_attachment_image_src($image_id,'full');
                ?>
                    <div class="product__list__item goteffect">
                        <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" class="lazy product__list__item--thumb" alt="<?php the_title(); ?>"  title="<?php the_title(); ?>"/>
                        <h3 class="product__list__item--tit"><?php the_title() ?></h3>
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="moremore"></a>
                    </div>
                <?php 
                endforeach; 
                echo '</div>';
                if(function_exists('wp_paginate')):
                    wp_paginate();   
                endif;
            endif; wp_reset_postdata();
        ?>
    </div>
</section>
<?php get_footer(); ?>