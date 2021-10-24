<?php
get_header();
$term = get_queried_object();
$term_link = get_term_link($term, 'product-category');
$term_description = term_description($term, "product-category");
?>
<section class="sebas__banner lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/sebas/bg01.png">
    <div class="container sebas__banner__flex">
        <div class="sebas__banner__content goteffect">
            <h1 title="sebas">
                <img src="<?php bloginfo('template_directory') ?>/images/sebas/sebas.png" width="317" height="92" alt="<?php echo $term->name ?>" title="<?php echo $term->name ?>" class="sebas__banner__logo" />
            </h1>
            <?php
            $sebas_intro_text = get_field('sebas_intro_text', $term);
            if ($sebas_intro_text) :
            ?>
                <div class="sebas__banner__des">
                    <?php echo $sebas_intro_text ?>
                </div>
            <?php
            endif;
            $categories = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 5
            ));
            if ($categories) :
            ?>
                <ul class="sebas__banner__menu">
                    <?php
                    foreach ($categories as $category) :
                        $category_link = get_term_link($category, 'product-category');
                    ?>
                        <li>
                            <a href="<?php echo $term_link ?>#<?php echo $category->slug ?>" title="<?php echo $category->name ?>"><?php echo $category->name ?></a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            <?php
            endif;
            ?>
        </div>
        <img src="<?php bloginfo('template_directory') ?>/images/sebas/girl.png" width="585" height="687" alt="avatar - <?php echo $term->name ?>" title="avatar - <?php echo $term->name ?>" class="sebas__banner__girl goteffect" />
    </div>
</section>
<?php
$sebas_trandition_title = get_field('sebas_trandition_title', $term);
$sebas_trandition_description = get_field('sebas_trandition_description', $term);
if ($sebas_trandition_title && $sebas_trandition_description) :
    $sebas_trandition_products = get_field('sebas_trandition_products', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($sebas_trandition_products) :
        $args['post__in'] = $sebas_trandition_products;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'truyen-thong-sebas'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="truyen-thong" class="sebas__traditional goteffect">
        <div class="container">
            <h2 class="sebas__traditional--title"><?php echo $sebas_trandition_title ?></h2>
            <div class="sebas__traditional__description">
                <?php echo $sebas_trandition_description ?>
            </div>
            <?php
            if ($postslist) :
            ?>
                <div class="owl-carousel owl-theme sebas__traditional__slides">
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
                        <div class="sebas__traditional__product">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="sebas__product__thumb lazy" />
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="sebas__traditional__product--title"><?php the_title() ?></h3>
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
$sebas_silk_title = get_field('sebas_silk_title', $term);
$sebas_silk_description = get_field('sebas_silk_description', $term);
if ($sebas_silk_title && $sebas_silk_description) :
    $sebas_silk_products = get_field('sebas_silk_products', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($sebas_silk_products) :
        $args['post__in'] = $sebas_silk_products;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'truyen-thong-sebas'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="silk" class="sebas__silk lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/sebas/bg02.png">
        <div class="container">
            <h2 class="sebas__silk--title"><?php echo $sebas_silk_title ?></h2>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 46
            ));
            if ($terms) :
                echo '<ul class="sebas__silk__categories catelist">';
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
            <div class="sebas__silk__description">
                <?php echo $sebas_silk_description ?>
            </div>
            <?php
            if ($postslist) :
            ?>
                <div class="owl-carousel owl-theme sebas__silk__slides">
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
                        <div class="sebas__silk__product">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="sebas__product__thumb lazy" />
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="sebas__silk__product--title"><?php the_title() ?></h3>
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
$sebas_powerbond_title = get_field('sebas_powerbond_title', $term);
$sebas_powerbond_description = get_field('sebas_powerbond_description', $term);
if ($sebas_powerbond_title && $sebas_powerbond_description) :
    $sebas_silk_products = get_field('sebas_silk_products', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',

    );
    if ($sebas_silk_products) :
        $args['post__in'] = $sebas_silk_products;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'powerbond'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="powerbond" class="sebas__powerbond goteffect">
        <div class="container">
            <h2 class="sebas__powerbond--title"><?php echo $sebas_powerbond_title ?></h2>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 47
            ));
            if ($terms) :
                echo '<ul class="sebas__powerbond__categories catelist">';
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
            <div class="sebas__powerbond__description">
                <?php echo $sebas_powerbond_description ?>
            </div>
            <?php
            if ($postslist) :
            ?>
                <div class="owl-carousel owl-theme sebas__powerbond__slides">
                    <?php
                    foreach ($postslist as $post) : setup_postdata($post);
                        $product_thumb_id = get_field('image', $post->ID);
                        $product_thumb = wp_get_attachment_image_src($product_thumb_id, 'full');
                    ?>
                        <div class="sebas__powerbond__product">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="sebas__product__thumb lazy" />
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="sebas__powerbond__product--title"><?php the_title() ?></h3>
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
<section class="sebas__info lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/sebas/bg02.png">
    <div class="container">
        <div class="sebas__info__round">
            <h2 class="sebas__info__title"><?php echo $term->name ?></h2>
            <?php echo $term_description ?>
        </div>
    </div>
</section>
<?php get_footer() ?>