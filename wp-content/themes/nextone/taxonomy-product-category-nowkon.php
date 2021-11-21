<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
$cate_i = 0;
?>
<section id="nowkonn__banner" class="nowkonn__banner lazy goteffect" data-bg="<?php echo imageEncode('/images/nowkonn/mainBackground.webp'); ?>">
    <div class="container">
        <h1 title="nowkonn" class="nowkonn__banner__title goteffect"><img src="<?php echo imageEncode('/images/nowkonn/nologo.png'); ?>" data-src="<?php echo imageEncode('/images/nowkonn/logo.png'); ?>" title="Nowkonn" alt="Nowkonn" class="lazy" /></h1>
        <?php
        $nowkonn_intro_text = get_field('nowkonn_intro_text', $term);
        if ($nowkonn_intro_text) :
        ?>
            <div class="nowkonn__banner__des goteffect">
                <?php echo $nowkonn_intro_text ?>
            </div>
        <?php
        endif;
        ?>
        <ul class="owl-carousel owl-theme nowkonn__banner__slides">
            <a href="#cate_i_1" class="nowkonn__banner__item nowkonn__banner__item01 goteffect">
                <img src="<?php echo imageEncode('/images/nowkonn/nomainGirl1.png'); ?>" data-src="<?php echo imageEncode('/images/nowkonn/mainGirl1.png'); ?>" class="lazy" width="300" height="300" title="Nowkonn Professional" alt="Nowkonn Professional" />
                <strong class="nowkonn__banner__slides--tit">DÒNG NHUỘM</strong>
            </a>
            <a href="#cate_i_2" class="nowkonn__banner__item nowkonn__banner__item02 goteffect">
                <img src="<?php echo imageEncode('/images/nowkonn/nomainGirl1.png'); ?>" data-src="<?php echo imageEncode('/images/nowkonn/mainGirl2.png'); ?>" class="lazy" width="300" height="300" title="Nowkonn Professional" alt="Nowkonn Professional" />
                <strong class="nowkonn__banner__slides--tit">DÒNG DƯỠNG</strong>
            </a>
            <a href="#cate_i_3" class="nowkonn__banner__item nowkonn__banner__item03 goteffect">
                <img src="<?php echo imageEncode('/images/nowkonn/nomainGirl1.png'); ?>" data-src="<?php echo imageEncode('/images/nowkonn/mainGirl3.png'); ?>" class="lazy" width="300" height="300" title="Nowkonn Professional" alt="Nowkonn Professional" />
                <strong class="nowkonn__banner__slides--tit">DÒNG TIÊU DÙNG</strong>
            </a>
        </ul>
    </div>
</section>

<?php
$nowkonn_dye_title = get_field('nowkonn_dye_title', $term);
$nowkonn_dye_description = get_field('nowkonn_dye_description', $term);
$nowkonn_dye_category = get_field('nowkonn_dye_category', $term);
$nowkonn_dye_thumbnail = get_field('nowkonn_dye_thumbnail', $term);
if ($nowkonn_dye_title && $nowkonn_dye_description) :
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
                'terms'    => $nowkonn_dye_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) : $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="nowkonn__common goteffect lazy" data-bg="<?php echo imageEncode('/images/nowkonn/background1.webp'); ?>">
            <div class="container nowkonn__common__flex">
                <div class="nowkonn__common__content">
                    <h2 class="nowkonn__common__content--tit goteffect"><?php echo $nowkonn_dye_title ?></h2>
                    <div class="nowkonn__common__content--des goteffect"><?php echo $nowkonn_dye_description ?></div>
                    <?php
                    if ($postslist) :
                    ?>
                        <ul class="owl-carousel owl-theme nowkonn__slides goteffect">
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
                                    <div class="nowkonn__product">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="nowkonn__product__thumb lazy" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="nowkonn__product__title"><?php the_title() ?></h3>
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
                    <?php
                    endif;
                    ?>
                </div>
                <div class="nowkonn__common__thumb lazy" data-bg="<?php echo $nowkonn_dye_thumbnail; ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<?php
$nowkonn_nursing_title = get_field('nowkonn_nursing_title', $term);
$nowkonn_nursing_description = get_field('nowkonn_nursing_description', $term);
$nowkonn_nursing_category = get_field('nowkonn_nursing_category', $term);
$nowkonn_nursing_thumbnail = get_field('nowkonn_nursing_thumbnail', $term);
if ($nowkonn_nursing_title && $nowkonn_nursing_description) :
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
                'terms'    => $nowkonn_nursing_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) : $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="nowkonn__common type02 lazy goteffect" data-bg="<?php echo imageEncode('/images/nowkonn/background2.webp'); ?>">
            <div class="container nowkonn__common__flex">
                <div class="nowkonn__common__content">
                    <h2 class="nowkonn__common__content--tit goteffect"><?php echo $nowkonn_nursing_title ?></h2>
                    <div class="nowkonn__common__content--des goteffect"><?php echo $nowkonn_nursing_description ?></div>
                    <?php
                    if ($postslist) :
                    ?>
                        <ul class="owl-carousel owl-theme nowkonn__slides goteffect">
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
                                    <div class="nowkonn__product">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="nowkonn__product__thumb lazy" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="nowkonn__product__title"><?php the_title() ?></h3>
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
                    <?php
                    endif;
                    ?>
                </div>
                <div class="nowkonn__common__thumb lazy" data-bg="<?php echo $nowkonn_nursing_thumbnail; ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<?php
$nowkonn_consumption_title = get_field('nowkonn_consumption_title', $term);
$nowkonn_consumption_description = get_field('nowkonn_consumption_description', $term);
$nowkonn_consumption_category = get_field('nowkonn_consumption_category', $term);
$nowkonn_consumption_thumbnail = get_field('nowkonn_consumption_thumbnail', $term);
if ($nowkonn_consumption_title && $nowkonn_consumption_description) :
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
                'terms'    => $nowkonn_consumption_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) : $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="nowkonn__common lazy goteffect" data-bg="<?php echo imageEncode('/images/nowkonn/background3.webp'); ?>">
            <div class="container nowkonn__common__flex">
                <div class="nowkonn__common__content">
                    <h2 class="nowkonn__common__content--tit goteffect"><?php echo $nowkonn_consumption_title ?></h2>
                    <div class="nowkonn__common__content--des goteffect"><?php echo $nowkonn_consumption_description ?></div>
                    <?php
                    if ($postslist) :
                    ?>
                        <ul class="owl-carousel owl-theme nowkonn__slides goteffect">
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
                                    <div class="nowkonn__product">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="nowkonn__product__thumb lazy" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="nowkonn__product__title"><?php the_title() ?></h3>
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
                    <?php
                    endif;
                    ?>
                </div>
                <div class="nowkonn__common__thumb lazy" data-bg="<?php echo $nowkonn_consumption_thumbnail; ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<?php
$nowkonn_bending_and_stretching_title = get_field('nowkonn_bending_and_stretching_title', $term);
$nowkonn_bending_and_stretching_description = get_field('nowkonn_bending_and_stretching_description', $term);
$nowkonn_bending_and_stretching_category = get_field('nowkonn_bending_and_stretching_category', $term);
$nowkonn_bending_and_stretching_thumbnail = get_field('nowkonn_bending_and_stretching_thumbnail', $term);

if ($nowkonn_bending_and_stretching_title && $nowkonn_bending_and_stretching_description) :
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
                'terms'    => $nowkonn_bending_and_stretching_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) : $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="nowkonn__common type02 lazy goteffect" data-bg="<?php echo imageEncode('/images/nowkonn/background2.webp'); ?>">
            <div class="container nowkonn__common__flex">
                <div class="nowkonn__common__content">
                    <h2 class="nowkonn__common__content--tit goteffect"><?php echo $nowkonn_bending_and_stretching_title ?></h2>
                    <div class="nowkonn__common__content--des goteffect"><?php echo $nowkonn_bending_and_stretching_description ?></div>
                    <?php
                    if ($postslist) :
                    ?>
                        <ul class="owl-carousel owl-theme nowkonn__slides goteffect">
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
                                    <div class="nowkonn__product">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="nowkonn__product__thumb lazy" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="nowkonn__product__title"><?php the_title() ?></h3>
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
                    <?php
                    endif;
                    ?>
                </div>
                <div class="nowkonn__common__thumb lazy" data-bg="<?php echo $nowkonn_bending_and_stretching_thumbnail; ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<section class="nowkonn__info lazy" data-bg="<?php echo imageEncode('/images/nowkonn/background4.webp'); ?>">
    <div class="container">
        <div class="nowkonn__info__round">
            <h2 class="nowkonn__info__title"><?php echo $term->name ?></h2>
            <?php echo $term_description ?>
        </div>
    </div>
</section>

<?php get_footer() ?>