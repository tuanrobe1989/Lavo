<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
?>
<section class="mpros__banner lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/mpros/bg-01.png">
    <div class="container mpros__banner__container">
        <h1 title="<?php echo $term->name ?>" class="mpros__banner--tit goteffect">
            <img src="<?php bloginfo('template_directory') ?>/images/mpros/mrpos.png" alt="<?php bloginfo('name') ?>" title="<?php bloginfo('name') ?>" />
        </h1>
        <div class="mpros__banner--des goteffect">
            <p><strong>M.PROS</strong> là thương hiệu chăm sóc và làm đẹp được sản xuất tại nhà máy tiêu chuẩn CGMP ASEAN <br>với quy trình kiểm soát nghiêm ngặt từ khâu nguyên vật liệu. <br>Mục đích mang đến cho người tiêu dùng các sản phẩm an toàn, có nguồn gốc xuất xứ rõ ràng.</p>
        </div>
    </div>
    <div class="container mpros__banner__container">
        <div class="owl-carousel owl-theme mpros__banner__slides">
            <a href="#" class="mpros__banner__item goteffect">
                <figure>
                    <img data-src="<?php bloginfo('template_directory') ?>/images/mpros/girl-01.png" alt="<?php echo $term->name ?> - Dòng Sản Phẩm Da" title="<?php echo $term->name ?> - Dòng Sản Phẩm Da" class="lazy">
                    <figcaption class="mpros__banner__item--tit">Dòng Da</figcaption>
                </figure>
            </a>
            <a href="#" class="mpros__banner__item goteffect">
                <figure>
                    <img data-src="<?php bloginfo('template_directory') ?>/images/mpros/girl-02.png" alt="<?php echo $term->name ?> - Dòng Sản Phẩm Tóc" title="<?php echo $term->name ?> - Dòng Sản Phẩm Tóc" class="lazy">
                    <figcaption class="mpros__banner__item--tit">Dòng Tóc</figcaption>
                </figure>
            </a>
            <a href="#" class="mpros__banner__item goteffect">
                <figure>
                    <img data-src="<?php bloginfo('template_directory') ?>/images/mpros/girl-03.png" alt="<?php echo $term->name ?> - Dòng Sản Phẩm Trang Điểm" title="<?php echo $term->name ?> - Dòng Sản Phẩm Trang Điểm" class="lazy">
                    <figcaption class="mpros__banner__item--tit">Dòng Trang Điểm</figcaption>
                </figure>
            </a>
        </div>
    </div>
</section>
<?php
$mpros_skin_title = get_field('mpros_skin_title', $term);
$mpros_skin_description = get_field('mpros_skin_description', $term);
$mpros_skin_products = get_field('mpros_skin_products', $term);
$args = array(
    'posts_per_page' => 30,
    'post_type'      => 'product',
    'post_status'    => 'publish',

);
if ($mpros_skin_products) :
    $args['post__in'] = $mpros_skin_products;
else :
    $args['tax_query'] =  array(
        array(
            'taxonomy' => 'product-category',
            'field'    => 'slug',
            'terms'    => 'dong-da-m-pros'
        )
    );
endif;
$postslist = get_posts($args);
if ($postslist) :
?>
    <section class="mpros__skin lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/mpros/bg-03.png">
        <div class="container">
            <?php if ($mpros_skin_title) : ?>
                <h2 class="mpros__skin--tit"><?php echo $mpros_skin_title ?></h2>
            <?php endif ?>
            <div class="mpros__skin__flex">
                <?php if ($mpros_skin_description) : ?>
                    <div class="mpros__skin__content">
                        <?php echo $mpros_skin_description; ?>
                    </div>
                <?php endif ?>
                <div class="mpros__skin__content2">
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'product-category',
                        'hide_empty' => false,
                        'parent' => 30
                    ));
                    if ($terms) :
                        echo '<ul class="mpros__skin__categories catelist">';
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
                    <ul class="owl-carousel owl-theme mpros__skin__slides">
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
                                <div class="mpros__skin__item">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <strong class="xpros__product__title"><?php the_title() ?></strong>
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
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php
$mpros_hair_title = get_field('mpros_hair_title', $term);
$mpros_hair_description = get_field('mpros_hair_description', $term);
$mpros_hair_products = get_field('mpros_hair_products', $term);
$args = array(
    'posts_per_page' => 30,
    'post_type'      => 'product',
    'post_status'    => 'publish',

);
if ($mpros_hair_products) :
    $args['post__in'] = $mpros_hair_products;
else :
    $args['tax_query'] =  array(
        array(
            'taxonomy' => 'product-category',
            'field'    => 'slug',
            'terms'    => 'dong-toc-m-pros'
        )
    );
endif;
$postslist = get_posts($args);
if ($postslist) :
?>
    <section class="mpros__hair lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/mpros/bg-02.png">
        <div class="container">
            <?php if ($mpros_hair_title) : ?>
                <h2 class="mpros__hair--title"><?php echo $mpros_hair_title ?></h2>
            <?php endif; ?>
            <?php if ($mpros_hair_description) : ?>
                <div class="mpros__hair__des">
                    <?php echo $mpros_hair_description ?>
                </div>
            <?php endif; ?>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 42
            ));
            if ($terms) :
                echo '<ul class="mpros__skin__categories catelist">';
                foreach ($terms as $cate) :
                    $catelink = get_term_link($cate, 'product-category');
                    echo '<li>';
                    echo '<a href="' . $catelink . '" title="' . $cate->name . '" >';
                    echo $cate->name;
                    echo '</a>';
                    echo '</li>';
                endforeach;
                echo '</ul>';
            endif;
            ?>
            <ul class="owl-carousel owl-theme mpros__hair__slides">
                <?php
                foreach ($postslist as $post) : setup_postdata($post);
                    $product_thumb_id = get_field('image', $post->ID);
                    $product_thumb = wp_get_attachment_image_src($product_thumb_id, 'full');
                    $shop_link_target = '_blank';
                    if (!$shop_link) :
                        $shop_link = 'https://www.facebook.com/messages/t/801328516583595';
                        $shop_link_target = '_new';
                    endif;
                ?>
                    <li>
                        <div class="mpros__hair__item">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <strong class="mpros__hair__item--title"><?php the_title() ?></strong>
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
    </section>
<?php
endif;
?>
<?php
$mpros_cosmetic_title = get_field('mpros_cosmetic_title', $term);
$mpros_cosmetic_description = get_field('mpros_cosmetic_description', $term);
$mpros_cosmetic_products = get_field('mpros_cosmetic_products', $term);
$args = array(
    'posts_per_page' => 30,
    'post_type'      => 'product',
    'post_status'    => 'publish',

);
if ($mpros_cosmetic_products) :
    $args['post__in'] = $mpros_cosmetic_products;
else :
    $args['tax_query'] =  array(
        array(
            'taxonomy' => 'product-category',
            'field'    => 'slug',
            'terms'    => 'dong-trang-diem-m-pros'
        )
    );
endif;
$postslist = get_posts($args);
if ($postslist) :
?>
    <section class="mpros__cosmetic lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/mpros/bg-03.png">
        <div class="container">
            <?php if ($mpros_cosmetic_title) : ?>
                <h2 class="mpros__cosmetic--title"><?php echo $mpros_cosmetic_title ?></h2>
            <?php endif; ?>
            <?php if ($mpros_cosmetic_description) : ?>
                <div class="mpros__cosmetic__des">
                    <?php echo $mpros_cosmetic_description; ?>
                </div>
            <?php endif; ?>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'parent' => 44
            ));
            if ($terms) :
                echo '<ul class="mpros__skin__categories catelist">';
                foreach ($terms as $cate) :
                    $catelink = get_term_link($cate, 'product-category');
                    echo '<li>';
                    echo '<a href="' . $catelink . '" title="' . $cate->name . '" >';
                    echo $cate->name;
                    echo '</a>';
                    echo '</li>';
                endforeach;
                echo '</ul>';
            endif;
            ?>
            <ul class="owl-carousel owl-theme mpros__cosmetic__slides">
                <?php
                foreach ($postslist as $post) : setup_postdata($post);
                    $product_thumb_id = get_field('image', $post->ID);
                    $product_thumb = wp_get_attachment_image_src($product_thumb_id, 'full');
                    $shop_link_target = '_blank';
                    if (!$shop_link) :
                        $shop_link = 'https://www.facebook.com/messages/t/801328516583595';
                        $shop_link_target = '_new';
                    endif;
                ?>
                    <div class="mpros__cosmetic__item">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <strong class="mpros__cosmetic__item--title"><?php the_title() ?></strong>
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
            </ul>
        </div>
    </section>
<?php
endif;
?>
<section class="mpros__info lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/mpros/bg-02.png">
    <div class="container">
        <div class="mpros__info__round">
            <h2 class="mpros__info__title"><?php echo $term->name ?></h2>
            <?php echo $term_description ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>