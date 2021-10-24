<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
$wazzi_content = get_field('wazzi_content', $term);
$cate_i = 0;
?>
<session class="wazzi-banner lazy goteffect" data-bg="<?php echo imageEncode('/images/wazzi/mainBackground.webp'); ?>">
    <div class="container wazzi-banner__container">
        <img src="<?php echo imageEncode('/images/wazzi/nomainLogo.png'); ?>" data-src="<?php echo imageEncode('/images/wazzi/mainLogo.png'); ?>" alt="Wazzi Professional" title="Wazzi Professional" class="wazzi-banner__logo lazy">
        <div class="wazzi-banner__desc goteffect"><?php echo $wazzi_content; ?></div>
        <div id="wazzi-banner__slider" class="wazzi-banner__slider goteffect owl-carousel owl-theme">
            <div class="wazzi-banner__item wazzi-banner__item01">
                <img src="<?php echo imageEncode('/images/wazzi/nogirlLeft.png'); ?>" data-src="<?php echo imageEncode('/images/wazzi/girlLeft.png'); ?>" alt="Wazzi Professional" title="Wazzi Professional" class="wazzi-banner__item__img lazy">
                <a href="#cate_i_1">
                    <h2 class="wazzi-banner__item__title">dòng chăm sóc da</h2>
                </a>
            </div>
            <div class="wazzi-banner__item wazzi-banner__item02">
                <img src="<?php echo imageEncode('/images/wazzi/nogirlLeft.png'); ?>" data-src="<?php echo imageEncode('/images/wazzi/girlRight.png'); ?>" alt="Wazzi Professional" title="Wazzi Professional" class="wazzi-banner__item__img lazy">
                <a href="#cate_i_2">
                    <h2 class="wazzi-banner__item__title">dòng chăm sóc tóc</h2>
                </a>
            </div>
        </div>
    </div>
</session>

<?php
$wazzi_skin_title = get_field('wazzi_skin_title', $term);
$wazzi_skin_description = get_field('wazzi_skin_description', $term);
$wazzi_skin_category = get_field('wazzi_skin_category', $term);
$wazzi_skin_thumbnail = get_field('wazzi_skin_thumbnail', $term);
if ($wazzi_skin_title && $wazzi_skin_description) :
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($product_of_nano) :
        $args['post__in'] = $product_of_nano;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => $wazzi_skin_category->slug
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) :
        $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="wazzi__common lazy goteffect" data-bg="<?php echo imageEncode('/images/wazzi/1Background.webp'); ?>">
            <div class="container wazzi__common__flex">
                <div class="wazzi__common__content">
                    <h2 class="wazzi__common__content--tit goteffect"><?php echo $wazzi_skin_title ?></h2>
                    <div class="wazzi__common__content--des goteffect"><?php echo $wazzi_skin_description ?></div>
                    <ul class="owl-carousel owl-theme wazzi__slides goteffect">
                        <?php
                        foreach ($postslist as $post) : setup_postdata($post);
                            $product_thumb_id = get_field('image', $post->ID);
                            $product_thumb = wp_get_attachment_image_src($product_thumb_id, 'full');
                            $shop_link = get_field('shop_link', $post->ID);
                            $shop_link_target = '_blank';
                            if (!$shop_link) :
                                $shop_link = 'https://www.facebook.com/messages/t/801328516583595';
                                $shop_link_target = '_new';
                            endif;
                        ?>
                            <li>
                                <div class="wazzi__product">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="wazzi__product__thumb lazy" />
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="wazzi__product__title"><?php the_title() ?></h3>
                                    </a>
                                    <span class="product__button">
                                        <a href="<?php echo $shop_link ?>" class="product__button__buy" <?php if ($shop_link_target) echo 'target = "' . $shop_link_target . '"' ?>><?php _e('mua ngay', 'lavo') ?></a>
                                        <a href="<?php the_permalink(); ?>" class="product__button__detail"><?php _e('chi tiết', 'lavo') ?></a>
                                    </span>
                                </div>
                            </li>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                <div class="wazzi__common__thumb lazy" data-bg="<?php echo $wazzi_skin_thumbnail ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>


<?php
$wazzi_hair_title = get_field('wazzi_hair_title', $term);
$wazzi_hair_description = get_field('wazzi_hair_description', $term);
$wazzi_hair_category = get_field('wazzi_hair_category', $term);
$wazzi_hair_thumbnail = get_field('wazzi_hair_thumbnail', $term);
if ($wazzi_hair_title && $wazzi_hair_description) :
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($product_of_nano) :
        $args['post__in'] = $product_of_nano;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => $wazzi_hair_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) :
        $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="wazzi__common type02 lazy goteffect" data-bg="<?php echo imageEncode('/images/wazzi/2Background.webp'); ?>">
            <div class="container wazzi__common__flex">
                <div class="wazzi__common__content">
                    <h2 class="wazzi__common__content--tit goteffect"><?php echo $wazzi_hair_title ?></h2>
                    <div class="wazzi__common__content--des goteffect"><?php echo $wazzi_hair_description ?></div>
                    <ul class="owl-carousel owl-theme wazzi__slides goteffect">
                        <?php
                        foreach ($postslist as $post) : setup_postdata($post);
                            $product_thumb_id = get_field('image', $post->ID);
                            $product_thumb = wp_get_attachment_image_src($product_thumb_id, 'full');
                            $shop_link = get_field('shop_link', $post->ID);
                            $shop_link_target = '_blank';
                            if (!$shop_link) :
                                $shop_link = 'https://www.facebook.com/messages/t/801328516583595';
                                $shop_link_target = '_new';
                            endif;
                        ?>
                            <li>
                                <div class="wazzi__product">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="wazzi__product__thumb lazy" />
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="wazzi__product__title"><?php the_title() ?></h3>
                                    </a>
                                    <span class="product__button">
                                        <a href="<?php echo $shop_link ?>" class="product__button__buy" <?php if ($shop_link_target) echo 'target = "' . $shop_link_target . '"' ?>><?php _e('mua ngay', 'lavo') ?></a>
                                        <a href="<?php the_permalink(); ?>" class="product__button__detail"><?php _e('chi tiết', 'lavo') ?></a>
                                    </span>
                                </div>
                            </li>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                <div class="wazzi__common__thumb lazy" data-bg="<?php echo $wazzi_hair_thumbnail ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<section class="wazzi__info lazy" data-bg="<?php echo imageEncode('/images/wazzi/3Background.webp'); ?>">
    <div class="container">
        <div class="wazzi__info__round">
            <h2 class="wazzi__info__title"><?php echo $term->name ?></h2>
            <?php echo $term_description ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>