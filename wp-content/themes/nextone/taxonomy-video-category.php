<?php 
    get_header();
    get_template_part('./components/breadcrums');
    $term = get_queried_object();
?>
<section class="blog__category">
<?php 
    $sliders = get_field('background_images',$term);
    if( have_rows('background_images',$term) ):
?>
<div class="owl-carousel owl-theme blog__category__sliders pc goteffect">
    <?php 
        while( have_rows('background_images',$term) ) : the_row();
            $slide_link = get_sub_field('link');
            $image = get_sub_field('image');
            if($slide_link):
            ?>
                <a href="<?php echo $slide_link ?>" title="" class="lazy blog__category__slideitem" data-bg="<?php echo $image['url'] ?>"></a> 
            <?php 
            else:
            ?>
                <div class="lazy blog__category__slideitem" data-bg="<?php echo $image['url'] ?>"></div>
            <?php
            endif;
        endwhile;
    ?>
</div>
<div class="owl-carousel owl-theme blog__category__sliders mb goteffect">
    <?php 
        foreach($sliders as $slide):
            $slide_link = get_sub_field('link',$slide->ID);
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
            <h1 class="blog__category__title common__bortit--tit"><?php echo $term->name ?></h1>
        </div>
        <?php 
            $paged = get_query_var('paged');
            $args = array(
                'numberposts' => 12,
                'post_type' => 'video',
                'post_status' => 'publish',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'paged' => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'video-category',
                        'field'    => 'slug',
                        'terms'    => $term->slug
                    )
                )
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ): 
                echo "<div class='blog__category__list'>";
                while ( $the_query->have_posts() ): $the_query->the_post();
                    $video = get_field( 'url' );
                    preg_match('/src="(.+?)"/', $video, $matches_url );
                    $src = $matches_url[1];	
                    preg_match('/embed(.*?)?feature/', $src, $matches_id );
                    $id = $matches_id[1];
                    $id = str_replace( str_split( '?/' ), '', $id );
        ?>
                <a href="<?php the_permalink() ?>" class="blog__category__item" title="<?php the_title() ?> goteffect">
                    <div class="blog__category__item--thumbbox">
                        <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="http://img.youtube.com/vi/<?php echo $id; ?>/mqdefault.jpg" class="lazy blog__detail__relateditem--image" alt="<?php the_title(); ?>"  title="<?php the_title(); ?>"/>
                    </div>
                    <h3 class="blog__category__item--tit"><?php the_title() ?></h3>
                    <?php echo the_excerpt(); ?>
                    <span class="blog__category__item--readmore"><?php _e('xem thêm','lavo'); ?></span>
                </a>
        <?php 
                endwhile;
                echo "</div>";
                if(function_exists('wp_paginate')):
                    wp_paginate();  
                endif;
            endif;wp_reset_postdata();
        ?>
    </div>
</section>
<?php 
    get_footer();
?>