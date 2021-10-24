<?php
get_header();
get_template_part('./components/breadcrums');
$curterm = get_the_terms($post, 'product-category');
$parent_term = get_top_term($curterm[0]);
switch ($parent_term->slug):
    case 'lavox':
        $product__detail__bg = get_bloginfo('template_directory') . "/images/lavox/bg-banner.png";
        $product__detail__related = get_bloginfo('template_directory') . "/images/lavox/bg-banner.png";
        break;
    case 'sebas':
        $product__detail__bg = get_bloginfo('template_directory') . "/images/sebas/bg01.png";
        $product__detail__related = get_bloginfo('template_directory') . "/images/sebas/bg02.png";
        break;
    case 'x-pros':
        $product__detail__bg = get_bloginfo('template_directory') . "/images/xpros/banner-xpros.png";
        $product__detail__related = get_bloginfo('template_directory') . "/images/xpros/xpros-dotted.png";
        break;
    case 'm-pros':
        $product__detail__bg = get_bloginfo('template_directory') . "/images/mpros/bg-01.png";
        $product__detail__related = get_bloginfo('template_directory') . "/images/mpros/bg-02.png";
        break;
    case 'yourway':
        $product__detail__bg = imageEncode('/images/yourway/background2.webp');
        $product__detail__related = imageEncode('/images/yourway/background1.webp');
        break;
    case 'spaline':
        $product__detail__bg = imageEncode('/images/spaline/bottomBackground.webp');
        $product__detail__related = imageEncode('/images/spaline/mainBackground.webp');
        break;
    case 'nowkon':
        $product__detail__bg = imageEncode('/images/nowkonn/mainBackground.webp');
        $product__detail__related = imageEncode('/images/nowkonn/background3.webp');
        break;
    case 'wazzi':
        $product__detail__bg = imageEncode('/images/wazzi/3Background.webp');
        $product__detail__related = imageEncode('/images/wazzi/3Background.webp');
        break;
endswitch;
?>
<section class="product__detail goteffect">
    <span class="product__detail__bg lazy" data-bg="<?php echo $product__detail__bg ?>"></span>
    <div class="container">
        <div class="product__detail__list">
            <div class="product__detail__item">
                <?php
                $product_title = get_the_title();
                $product_id = get_the_id();
                $image_id = get_field('image');
                $image = wp_get_attachment_image_src($image_id, 'full');
                $shop_link = get_field('shop_link');
                ?>
                <img src="<?php echo $image[0] ?>" alt="<?php echo $product_title ?>" title="<?php echo $product_title ?>" class="product__detail__thumb goteffect" />
            </div>
            <div class="product__detail__item product__detail__content">
                <h1 class="product__detail__title"><?php echo $product_title ?></h1>
                <div class="product__detail__des">
                    <strong class="product__detail__subtit"><?php _e('Công Dụng', 'lavo') ?></strong>
                    <?php
                    $product_description = get_field('product_description');
                    if ($product_description) echo $product_description;
                    ?>
                    <?php
                    $product_size = get_field('product_size');
                    if ($product_size) :
                    ?>
                        <div class="product__detail__size">
                            <strong class="product__detail__subtit"><?php _e('Dung Tích', 'lavo') ?></strong> :
                            <?php echo $product_size ?>
                            <?php ?>
                        </div>
                    <?php
                    endif;
                    ?>
                    <?php if ($shop_link) : ?>
                        <a href="<?php echo $shop_link ?>" target="_new" class="button buynow"><?php _e('Mua Sản Phẩm', 'lavo'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product__detail__guide goteffect">
    <div class="container">
        <?php
        $product_guide = get_field('product_guide');
        ?>
        <div class="product__detail__model">
            <div class="product__detail__modelitem goteffect">
                <div class="product__detail__modelitem---content">
                    <strong class="product__detail__subtit"><?php _e('Hướng Dẫn Sử Dụng', 'lavo') ?></strong>
                    <?php echo $product_guide ?>
                </div>
            </div>
            <!-- <div class="product__detail__modelitem goteffect">
                <?php
                $model_thumb =  get_bloginfo('home') . '/ekophooz/2020/08/Layer-1.png';
                $image_sub_girl_id = get_field('image_sub_girl');
                $product_categories = get_the_terms($product_id, 'product-category');
                $top_category = get_top_term($product_categories[0]);
                if ($image_sub_girl_id) :
                    $image_sub_girl = wp_get_attachment_image_src($image_sub_girl_id, 'product-girl-bottom');
                    $model_thumb = $image_sub_girl[0];
                endif;
                if (!$image_sub_girl_id) :
                    $product_category_thumb = get_field('model', $top_category);
                    if ($product_category_thumb) $model_thumb = $product_category_thumb;
                endif;
                ?>
                <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $model_thumb ?>" class="lazy" title="<?php echo $product_title ?>" title="<?php echo $product_title ?>"/>
            </div>-->
            <span class="product__detail__model--bg goteffect"></span>
        </div>
    </div>
</section>
<?php
if ($top_category) :
    $product_single_title = get_field('product_single_title', $top_category);
    $product_single_description = get_field('product_single_description', $top_category);
    $args = array(
        'posts_per_page' => '12',
        'post_type' => 'product',
        'post_status' => 'publish',
        'post__not_in' => array($product_id),
        'orderby' => 'rand',
        'order'    => 'ASC',
    );
    $related_products = get_field('related_products');
    if ($related_products) :
        $args['post__in'] = $related_products;
    else :
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product-category',
                'field' => 'id',
                'terms' => $top_category->term_id,
            )
        );
    endif;
    $product_related = get_posts($args);
    if ($product_related) :
?>
        <section class="product__detail__related goteffect lazy" data-bg="<?php echo $product__detail__related ?>">
            <div class="container">
                <?php
                if ($product_single_title && $product_single_description) :
                ?>
                    <h2 class="product__detail__related--tit goteffect"><?php echo $product_single_title ?></h2>
                    <div class="product__detail__related--des goteffect">
                        <?php echo $product_single_description ?>
                    </div>
                <?php
                endif;
                ?>
                <div class="owl-carousel owl-theme product__detail__relatedlist goteffect">
                    <?php
                    foreach ($product_related as $post) : setup_postdata($post);
                        $image_id = get_field('image', $post->ID);
                        $image = wp_get_attachment_image_src($image_id, 'full');
                    ?>
                        <div class="product__detail__relateditem">
                            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                                <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" class="lazy product__detail__relateditem--thumb" title="<?php the_title() ?>" title="<?php the_title() ?>" />
                            </a>
                            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                                <h3 class="product__detail__relateditem--tit"><?php the_title(); ?></h3>
                            </a>
                            <!-- <span class="product__detail__relateditem--readmore">Xem Thêm</span> -->
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
<?php
    endif;
endif;
?>
<?php
$blogs = get_field('blogs');
if ($blogs) :
?>
    <section class="product__blogs">
        <div class="container">
            <div class="common__bortit">
                <h2 class="blog__category__title common__bortit--tit"><?php _e('Bài Viết Liên Quan', 'lavo') ?></h2>
            </div>
            <div class="home__blog__list"> 
                <?php 
                    foreach($blogs as $post): setup_postdata($post); 
                    $image_id = get_field('image', $post->ID);
                    $image = wp_get_attachment_image_src($image_id, 'blog-size-small');
                    $new_cate = get_the_terms($post->ID, 'blog-category');
                ?>
                <div class="home__blog__item" title="<?php the_title() ?>">
                        <a href="<?php the_permalink() ?>" <?php the_title() ?> class="home__blog__item--img">
                            <img src="<?php echo IMAGE_THEMES . 'no-image-banner.png' ?>" data-src="<?php echo $image[0] ?>" class="lazy" title="<?php the_title() ?>" alt="<?php the_title() ?>" width="450" height="280" />
                        </a>
                        <a href="<?php the_permalink() ?>" <?php the_title() ?>>
                            <h3 class="home__blog__item--tit" title="<?php the_title() ?>"><?php the_title() ?></h3>
                        </a>
                        <div class="home__blog__item--des">
                            <time datetime="<?php echo get_the_date('Y-m-d h:m') ?>" class="home__blog__item--time"><?php echo get_the_date('d-m-Y') ?></time>
                            <?php if ($new_cate) : ?>
                                <a class="top__news__item--cate" href="<?php echo get_term_link($new_cate[0]->term_id, 'blog-category') ?>" title="<?php echo $new_cate[0]->name ?>"><?php echo $new_cate[0]->name ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                    endforeach;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php get_footer(); ?>