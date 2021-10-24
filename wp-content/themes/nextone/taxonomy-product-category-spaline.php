<?php
get_header();
$term = get_queried_object();
$term_link = get_term_link($term, 'product-category');
$term_description = term_description($term, "product-category");
$cate_i = 0;
?>

<section class="spaline__banner lazy goteffect" data-bg="<?php echo imageEncode('/images/spaline/mainBackground.webp'); ?>">
    <div class="container spaline__banner__flex">
        <div class="spaline__banner__content goteffect">
            <h1 title="spaline">
                <img src="<?php bloginfo('template_directory') ?>/images/spaline/nologo.png" data-src="<?php bloginfo('template_directory') ?>/images/spaline/logo.png" width="572" height="174" alt="<?php echo $term->name ?>" title="<?php echo $term->name ?>" class="spaline__banner__logo lazy" />
            </h1>
            <?php
            $spaline_intro_text = get_field('spaline_intro_text', $term);
            if ($spaline_intro_text) :
            ?>
                <div class="spaline__banner__des">
                    <?php echo $spaline_intro_text ?>
                </div>
            <?php
            endif;
            $categories = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 75
            ));
            if ($categories) :
            ?>
                <ul class="spaline__banner__menu">
                    <?php
                    $i = 0;
                    foreach ($categories as $category) : $i++;
                        $category_link = get_term_link($category, 'product-category');
                    ?>
                        <li>
                            <a href="#cate_i_<?php echo $i ?>" title="<?php echo $category->name ?>"><?php echo $category->name ?></a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            <?php
            endif;
            ?>
        </div>
        <img src="<?php bloginfo('template_directory') ?>/images/spaline/nomainGirl.png" data-src="<?php bloginfo('template_directory') ?>/images/spaline/mainGirl.png" width="585" height="687" alt="avatar - <?php echo $term->name ?>" title="avatar - <?php echo $term->name ?>" class="spaline__banner__girl lazy goteffect" />
    </div>
</section>


<?php
$spaline_dye_title = get_field('spaline_dye_title', $term);
$spaline_dye_description = get_field('spaline_dye_description', $term);
$spaline_dye_category = get_field('spaline_dye_category', $term);
$spaline_dye_thumbnail = get_field('spaline_dye_thumbnail', $term);
if ($spaline_dye_title && $spaline_dye_description) :
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
                'terms'    => $spaline_dye_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) : $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="spaline__common goteffect">
            <div class="container spaline__common__flex">
                <div class="spaline__common__content">
                    <h2 class="spaline__common__content--tit goteffect"><?php echo $spaline_dye_title ?></h2>
                    <div class="spaline__common__content--des goteffect"><?php echo $spaline_dye_description ?></div>
                    <?php
                    if ($postslist) :
                    ?>
                        <ul class="owl-carousel owl-theme spaline__slides goteffect">
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
                                    <div class="spaline__product">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="spaline__product__thumb lazy" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="spaline__product__title"><?php the_title() ?></h3>
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
                <div class="spaline__common__thumb lazy" data-bg="<?php echo $spaline_dye_thumbnail; ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<?php
$spaline_nursing_title = get_field('spaline_nursing_title', $term);
$spaline_nursing_description = get_field('spaline_nursing_description', $term);
$spaline_nursing_category = get_field('spaline_nursing_category', $term);
$spaline_nursing_thumbnail = get_field('spaline_nursing_thumbnail', $term);
if ($spaline_nursing_title && $spaline_nursing_description) :
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
                'terms'    => $spaline_nursing_category->slug,
            )
        );
    endif;
    $postslist = get_posts($args);
    if ($postslist) : $cate_i++;
?>
        <section id="cate_i_<?php echo $cate_i ?>" class="spaline__common type02 goteffect">
            <div class="container spaline__common__flex">
                <div class="spaline__common__content">
                    <h2 class="spaline__common__content--tit goteffect"><?php echo $spaline_nursing_title ?></h2>
                    <div class="spaline__common__content--des goteffect"><?php echo $spaline_nursing_description ?></div>
                    <?php
                    if ($postslist) :
                    ?>
                        <ul class="owl-carousel owl-theme spaline__slides goteffect">
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
                                    <div class="spaline__product">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="spaline__product__thumb lazy" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="spaline__product__title"><?php the_title() ?></h3>
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
                <div class="spaline__common__thumb lazy" data-bg="<?php echo $spaline_nursing_thumbnail; ?>"></div>
            </div>
        </section>
<?php
    endif;
endif;
?>

<section class="spaline__info lazy goteffect" data-bg="<?php echo imageEncode('/images/spaline/bottomBackground.webp'); ?>">
    <div class="container">
        <div class="spaline__info__round">
            <h2 class="spaline__info__title"><?php echo $term->name ?></h2>
            <?php echo $term_description ?>
        </div>
    </div>
</section>

<?php get_footer() ?>