<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
?>
<section id="xpros__banner" class="xpros__banner lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/xpros/banner-xpros.png">
    <div class="container">
        <h1 title="XPros" class="xpros__banner__title goteffect"><img src="<?php bloginfo('template_directory') ?>/images/xpros/xpos-logo-white.png" title="xpros" alt="xpros" /></h1>
        <p class="xpros__banner__des goteffect"><strong>X.pros</strong> là dòng sản phẩm chuyên nghiệp <br>dành cho các salon yêu thích sự sáng tạo, hướng đến xu thế <br>tạo nên sự khác biệt, sắc thái riêng cho từng các loại tóc khác nhau. </p>
        <ul class="owl-carousel owl-theme xpros__banner__slides">
            <a href="#xpros__tranditional" class="xpros__banner__item xpros__banner__item01 goteffect">
                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php bloginfo('template_directory') ?>/images/xpros/image-01.png" width="300" height="300" title="x.pros truyền thống" alt="x.pros truyền thống" class="lazy" />
                <strong class="xpros__banner__slides--tit">X.pros Truyền Thống</strong>
                <span class="xpros__banner__slides--readmore"><?php _e('xem thêm', 'lavo'); ?></span>
            </a>
            <a href="#xpros__fiber" class="xpros__banner__item xpros__banner__item02 goteffect">
                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php bloginfo('template_directory') ?>/images/xpros/image-02.png" width="300" height="300" title="x.pros truyền thống" alt="x.pros truyền thống" class="lazy" />
                <strong class="xpros__banner__slides--tit">X.pros Fiber</strong>
                <span class="xpros__banner__slides--readmore"><?php _e('xem thêm', 'lavo'); ?></span>
            </a>
            <a href="#xpros-fiberflex" class="xpros__banner__item xpros__banner__item03 goteffect">
                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php bloginfo('template_directory') ?>/images/xpros/image-03.png" width="300" height="300" title="x.pros truyền thống" alt="x.pros truyền thống" class="lazy" />
                <strong class="xpros__banner__slides--tit">X.pros FiberFlex</strong>
                <span class="xpros__banner__slides--readmore"><?php _e('xem thêm', 'lavo'); ?></span>
            </a>
        </ul>
    </div>
</section>
<?php
$xpros_tranditional_title = get_field('xpros_tranditional_title', $term);
$xpros_traditional_description = get_field('xpros_traditional_description', $term);
if ($xpros_tranditional_title && $xpros_traditional_description) :
    $xpros_traditional_proudcts = get_field('xpros_traditional_proudcts', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($xpros_traditional_proudcts) :
        $args['post__in'] = $xpros_traditional_proudcts;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'x-pros'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="xpros__tranditional" class="xpros__tranditional lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/xpros/bg-01.jpg">
        <div class="container">
            <h2 class="xpros__tranditional__tit goteffect"><?php echo $xpros_tranditional_title ?></h2>
            <div class="xpros__tranditional__des goteffect"><?php echo $xpros_traditional_description ?></div>
            <?php
            if ($postslist) :
            ?>
                <div class="owl-carousel owl-theme xpros__tranditional__slides">
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
                        <div class="xpros__product">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="xpros__product__title"><?php the_title() ?></h3>
                            </a>
                            <span class="product__button">
                                <a href="<?php echo $shop_link ?>" class="product__button__buy" <?php if ($shop_link_target) echo 'target = "' . $shop_link_target . '"' ?>><?php _e('mua ngay', 'lavo') ?></a>
                                <a href="<?php the_permalink(); ?>" class="product__button__detail"><?php _e('chi tiết', 'lavo') ?></a>
                            </span>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
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

<?php
$xpros_fiber_title = get_field('xpros_fiber_title', $term);
$xpros_fiber_description = get_field('xpros_fiber_description', $term);
if ($xpros_fiber_title && $xpros_fiber_description) :
    $xpros_fiber_products = get_field('xpros_fiber_products', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($xpros_fiber_products) :
        $args['post__in'] = $xpros_fiber_products;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'x-pros-fiber'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="xpros__fiber" class="xpros__fiber lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/xpros/xpros-dotted.png">
        <div class="container">
            <h2 class="xpros__fiber__tit goteffect"><?php echo $xpros_fiber_title ?></h2>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 85
            ));
            if ($terms) :
                echo '<ul class="catelist goteffect">';
                foreach ($terms as $cate) :
                    $catelink = get_term_link($cate, 'product-category');
                    echo '<li>';
                    echo '<a href="' . $catelink . '" title="' . $cate->name . '">';
                    echo $cate->name;
                    echo '</a>';
                    echo '</li>';
                endforeach;
                echo '</ul>';
            endif;
            ?>
            <div class="xpros__fiber__des goteffect"><?php echo $xpros_fiber_description ?></div>
            <?php
            if ($postslist) :
            ?>
                <div class="owl-carousel owl-theme xpros__fiber__slides goteffect">
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
                        <div class="xpros__product">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="xpros__product__title"><?php the_title() ?></h3>
                            </a>
                            <span class="product__button">
                                <a href="<?php echo $shop_link ?>" class="product__button__buy" <?php if ($shop_link_target) echo 'target = "' . $shop_link_target . '"' ?>><?php _e('mua ngay', 'lavo') ?></a>
                                <a href="<?php the_permalink(); ?>" class="product__button__detail"><?php _e('chi tiết', 'lavo') ?></a>
                            </span>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
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
<?php
$xpros_fiberflex_title = get_field('xpros_fiberflex_title', $term);
$xpros_fiberflex_description = get_field('xpros_fiberflex_description', $term);
if ($xpros_fiberflex_title && $xpros_fiberflex_description) :
    $xpros_fiberflex_products_2 = get_field('xpros_fiberflex_products_2', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($xpros_fiberflex_products_2) :
        $args['post__in'] = $xpros_fiberflex_products_2;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'x-pros-fiberflex-tai-salon'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="xpros-fiberflex" class="xpros__fiberflex goteffect">
        <div class="container">
            <h2 class="xpros__fiberflex__tit"><?php echo $xpros_fiberflex_title ?></h2>
            <div class="xpros__fiberflex__des"><?php echo $xpros_fiberflex_description ?></div>
        </div>
        <div class="container xpros__fiberflex__flex type02">
            <div class="xpros__fiberflex__content">
                <?php
                if ($postslist) :
                ?>
                    <h3 class="xpros__fiberflex__subtit" title="<?php echo $xpros_fiberflex_title ?>"><?php _e('tại salon', 'lavo') ?></h3>
                    <div class="owl-carousel owl-theme xpros__slides">
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
                            <div class="fiber__product">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                                </a>
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="xpros__product__title"><?php the_title() ?></h3>
                                </a>
                                <span class="product__button">
                                    <a href="<?php echo $shop_link ?>" class="product__button__buy" <?php if ($shop_link_target) echo 'target = "' . $shop_link_target . '"' ?>><?php _e('mua ngay', 'lavo') ?></a>
                                    <a href="<?php the_permalink(); ?>" class="product__button__detail"><?php _e('chi tiết', 'lavo') ?></a>
                                </span>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="xpros__fiberflex__thumb lazy" data-bg="<?php bloginfo('template_directory') ?>/images/xpros/image-05.png"></div>
        </div>
        <?php
        $xpros_fiberflex_products = get_field('xpros_fiberflex_products', $term);
        $args = array(
            'posts_per_page' => 30,
            'post_type'      => 'product',
            'post_status'    => 'publish',

        );
        if ($xpros_fiberflex_products) :
            $args['post__in'] = $xpros_fiberflex_products;
        else :
            $args['tax_query'] =  array(
                array(
                    'taxonomy' => 'product-category',
                    'field'    => 'slug',
                    'terms'    => 'x-pros-fiberflex-tai-nha'
                )
            );
        endif;
        $postslist = get_posts($args);
        ?>
        <div class="container xpros__fiberflex__flex">
            <div class="xpros__fiberflex__content">
                <?php
                if ($postslist) :
                ?>
                    <h3 class="xpros__fiberflex__subtit" title="<?php echo $xpros_fiberflex_title ?>"><?php _e('tại nhà', 'lavo') ?></h3>
                    <div class="owl-carousel owl-theme xpros__slides">
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
                            <div class="fiber__product">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                                </a>
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="xpros__product__title"><?php the_title() ?></h3>
                                </a>
                                <span class="product__button">
                                    <a href="<?php echo $shop_link ?>" class="product__button__buy" <?php if ($shop_link_target) echo 'target = "' . $shop_link_target . '"' ?>><?php _e('mua ngay', 'lavo') ?></a>
                                    <a href="<?php the_permalink(); ?>" class="product__button__detail"><?php _e('chi tiết', 'lavo') ?></a>
                                </span>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="xpros__fiberflex__thumb lazy" data-bg="<?php bloginfo('template_directory') ?>/images/xpros/image-06.png"></div>
        </div>
    </section>
    <section class="xpros__info lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/xpros/bg-01.jpg">
        <div class="container">
            <div class="xpros__info__round">
                <h2 class="xpros__info__title"><?php echo $term->name ?></h2>
                <?php echo $term_description ?>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php get_footer() ?>