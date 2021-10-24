<?php
/* Template Name: Brand Page */
?>
<?php get_header(); ?>
<?php 
    $page_id = get_the_id();
    $page_title = get_the_title();
    $content = get_field('content');
    $content_girl = get_field('content_girl');
    $related_category = get_field('related_category');
    $background_color = get_field('background_color');
?>
<section class="product__brand__banner goteffect" style="background-color:<?php echo $background_color ?>">
    <div class="container">
        <div class="product__brand__banner--flex">
            <div class="product__brand__banner--content">
                <h1 class="product__brand__banner--tit goteffect"><?php echo $page_title ?></h1>
                <div class="product__brand__banner--des goteffect">
                    <?php echo $content ?>
                    <span class="product__brand__banner--line"></span>
                </div>
            </div>
            <div class="product__brand__banner--image">
                <img data-src="<?php echo $content_girl ?>" class="product__brand__banner--girl lazy goteffect" alt="<?php echo $page_title ?>" title="<?php echo $page_title ?>"/>
            </div>
        </div>
    </div>
</section>
<?php 
    if( have_rows('specials') ):
?>
<section class="product__brand__special goteffect">
    <div class="container">
        <div class="common__bortit goteffect">
            <h2 class="common__bortit--tit goteffect"><?php _e('bộ sưu tập','lavo') ?> <span><?php _e('nổi bật','lavo'); ?></span></h2>
            <p class="common__bortit--des goteffect"><?php _e('giải pháp của chúng tôi được thiết kế riêng cho từng cá nhân hiểu từng nhu cầu cụ thể','lavo')?></p>
        </div>

        <div id="brand-carousel" class="product__brand__carousel carousel goteffect">
            <?php 
                while( have_rows('specials') ) : the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
            ?>
                <a href="<?php ?>" class="carousel-item">
                    <img  src="<?php echo $image['url'] ?>" title="<?php echo $image['title'] ?>" alt="<?php echo $image['description'] ?>" class="lazy" width="500">
                </a>
            <?php 
                endwhile;
            ?>
        </div>
    </div>
</section>
<?php 
    endif;
?>
<?php 
    if($related_category):
        $specials_products = get_field('specials_products',$related_category);
        $args = array(
            'numberposts' => 12,
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product-category',
                    'field'    => 'slug',
                    'terms'    => $related_category->slug
                )
            )
        );
        if($specials_products) $args['post__in'] = $specials_products;
        $product_related = get_posts($args);
?>
<section class="product__detail__related goteffect">
    <div class="container">
        <div class="common__bortit goteffect">
            <h2 class="common__bortit--tit goteffect">SẢN PHẨM <span>NỔI BẬT</span></h2>
            <p class="common__bortit--des goteffect">Với bề dày kinh nghiệm trong lĩnh vực tóc cùng những tinh túy qua quá trình nghiên cứu, <br/>các chuyên gia đã cho ra đời dòng sản phẩm cao cấp SEBAS.</p>
        </div>
        <?php 
        if($product_related):
        ?>
        <div class="owl-carousel owl-theme product__detail__relatedlist">
            <?php
                foreach($product_related as $post): setup_postdata($post);
                    $image_id = get_field('image',$post->ID);
                    $image = wp_get_attachment_image_src($image_id,'full');
                ?>
                    <div class="product__detail__relateditem">
                        <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" class="lazy product__detail__relateditem--thumb" title="<?php the_title() ?>" title="<?php the_title() ?>"/>
                        <h3 class="product__detail__relateditem--tit"><?php the_title(); ?></h3>
                        <span class="product__detail__relateditem--readmore">Xem Thêm</span>
                        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="commom__readmore"></a>
                    </div>
                <?php
                endforeach;wp_reset_postdata();
            ?>
        </div>
        <?php
        endif;
        ?>
    </div>
</section>
<?php 
    endif;
?>
<?php get_footer(); ?>