<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
?>
<section id="lavox__banner" class="lavox__banner lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/lavox/bg-banner.png">
    <div class="container">
        <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php bloginfo('template_directory') ?>/images/lavox/model.png" alt="Lavox là nhãn hiệu mỹ phẩm tóc chất lượng hàng đầu Việt Nam" title="Lavox là nhãn hiệu mỹ phẩm tóc chất lượng hàng đầu Việt Nam" class="lavox__banner__model lazy goteffect" />
        <div class="lavox__banner__content goteffect">
            <h1 class="lavox__banner__content--tit">Lavox là nhãn hiệu mỹ phẩm tóc chất lượng hàng đầu Việt Nam</h1>
            <p class="lavox__banner__content--sub">Lavox không chỉ tập trung tạo ra các sản phẩm nhuộm - uốn – duỗi theo xu hướng mới, chúng tôi còn chú trọng mạnh vào việc bảo vệ liên kết tóc, nhằm mang đến cho khách hàng một mái tóc đẹp, hợp thời trang, chắc khỏe từ sâu bên trong.</p>
        </div>
    </div>
</section>
<?php
$title_of_tranditional = get_field('title_of_tranditional', $term);
$description_of_tranditional = get_field('description_of_tranditional', $term);
if ($title_of_tranditional && $description_of_tranditional) :
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
                'terms'    => 'lavox-truyen-thong'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="lavox-tranditional" class="lavox__common goteffect">
        <div class="container lavox__common__flex">
            <div class="lavox__common__content">
                <h2 class="lavox__common__content--tit"><?php echo $title_of_tranditional ?></h2>
                <div class="lavox__common__content--des"><?php echo $description_of_tranditional ?></div>
                <?php
                if ($postslist) :
                ?>
                    <ul class="owl-carousel owl-theme lavox__slides">
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
                                <div class="lavox__product">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="lavox__product__thumb lazy" /></a>
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="lavox__product__title"><?php the_title() ?></h3>
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
            <div class="lavox__common__thumb lazy" data-bg="<?php bloginfo('template_directory') ?>/images/lavox/image-01.png"></div>
        </div>
    </section>
<?php
endif;
?>
<?php
$title_of_nano = get_field('title_of_nano', $term);
$description_of_nano = get_field('description_of_nano', $term);
$product_of_nano = get_field('product_of_nano', $term);
if ($title_of_nano && $description_of_nano) :
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
                'terms'    => 'nano-complex'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="lavox-nano" class="lavox__common type02 goteffect">
        <div class="container lavox__common__flex">
            <div class="lavox__common__content goteffect">
                <h2 class="lavox__common__content--tit"><?php echo $title_of_nano; ?></h2>
                <div class="lavox__common__content--des"><?php echo $description_of_nano; ?></div>
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'product-category',
                    'hide_empty' => false,
                    'parent' => 33
                ));
                if ($terms) :
                    echo '<ul class="catelist">';
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
                <?php
                if ($postslist) :
                ?>
                    <ul class="owl-carousel owl-theme lavox__slides">
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
                                <div class="lavox__product">
                                    <a href=" <?php the_permalink(); ?>">
                                        <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="lavox__product__thumb lazy" />
                                    </a>
                                    <a href=" <?php the_permalink(); ?>">
                                        <h3 class="lavox__product__title"><?php the_title() ?></h3>
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
            <div class="lavox__common__thumb lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/lavox/image-02.png"></div>
        </div>
    </section>
<?php
endif;
?>
<?php
$title_of_bondpro = get_field('title_of_bondpro', $term);
$description_of_bondpro = get_field('description_of_bondpro', $term);
$product_of_bondpro = get_field('product_of_bondpro', $term);
if ($title_of_bondpro && $description_of_bondpro) :
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
                'terms'    => 'bondpro'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="lavox-bondpro" class="lavox__common goteffect">
        <div class="container lavox__common__flex">
            <div class="lavox__common__content goteffect">
                <h2 class="lavox__common__content--tit"><?php echo $title_of_bondpro ?></h2>
                <div class="lavox__common__content--des"><?php echo $description_of_bondpro ?></div>
                <?php
                if ($postslist) :
                ?>
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'product-category',
                        'hide_empty' => false,
                        'parent' => 30
                    ));
                    if ($terms) :
                        echo '<ul class="catelist">';
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
                    <ul class="owl-carousel owl-theme lavox__slides">
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
                                <div class="lavox__product">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="lavox__product__thumb lazy" /></a>
                                    <h3 class="lavox__product__title"><?php the_title() ?></h3>
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
            <div class="lavox__common__thumb lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/lavox/image-03.png"></div>
        </div>
    </section>
<?php
endif;
?>
<?php
$title_of_consumer = get_field('title_of_consumer', $term);
$description_consumer = get_field('description_consumer', $term);
if ($title_of_consumer && $description_consumer) :
    $product_of_consumer = get_field('product_of_consumer', $term);
    $args = array(
        'posts_per_page' => 30,
        'post_type'      => 'product',
        'post_status'    => 'publish',
    );
    if ($product_of_consumer) :
        $args['post__in'] = $product_of_consumer;
    else :
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'product-category',
                'field'    => 'slug',
                'terms'    => 'lavox-tieu-dung'
            )
        );
    endif;
    $postslist = get_posts($args);
?>
    <section id="lavox-consumer" class="lavox__common type02 goteffect">
        <div class="container lavox__common__flex">
            <div class="lavox__common__content goteffect">
                <h2 class="lavox__common__content--tit"><?php echo $title_of_consumer ?></h2>
                <div class="lavox__common__content--des"><?php echo $description_consumer ?></div>
                <?php
                if ($postslist) :
                ?>
                    <ul class="owl-carousel owl-theme lavox__slides">
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
                                <div class="lavox__product">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="lavox__product__thumb lazy" /></a>
                                    <h3 class="lavox__product__title"><?php the_title() ?></h3>
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
            <div class="lavox__common__thumb lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/lavox/image-04.png"></div>
        </div>
    </section>
<?php
endif;
?>
<section class="lavox__info lazy goteffect" data-bg="<?php bloginfo('template_directory') ?>/images/lavox-bg-2.png">
    <div class="container">
        <div class="lavox__info__round">
            <h2 class="lavox__info__title"><?php echo $term->name ?></h2>
            <?php echo $term_description ?>
        </div>
    </div>
</section>
<?php
get_footer();
