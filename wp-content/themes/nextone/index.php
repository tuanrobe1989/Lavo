<?php
/* Template Name: Home Page */
?>
<?php
get_header();
?>
<?php
$frontpage_id = get_option('page_on_front');
$sliders = get_field('background_images', $frontpage_id);
if ($sliders) :
?>
    <section class="home__sliderAround">
        <div class="owl-carousel owl-theme home__sliders goteffect">
            <?php
            foreach ($sliders as $slide) :
            ?>
                <a href="<?php echo $slide['link'] ?>" title="<?php echo $slide['image']['title']; ?>">
                    <img src="<?php echo IMAGE_THEMES . 'no-image-banner.png' ?>" data-src="<?php echo $slide['image']['url'] ?>" height="710" width="1440" alt="<?php echo $slide['image']['alt'] ?>" title="<?php echo $slide['image']['title'] ?>" class="lazy" />
                </a>
            <?php
            endforeach;
            ?>
        </div>
    </section>
<?php
endif;
?>
<?php
$specials = get_field('specials', $frontpage_id);
if ($specials) :
?>
    <section class="home__special goteffect">
        <div class="container">
            <div class="common__bortit goteffect">
                <h2 class="common__bortit--tit goteffect"><?php _e('sản phẩm tập', 'lavo') ?> <span><?php _e('nổi bật', 'lavo'); ?></span></h2>
                <p class="common__bortit--des goteffect"><?php _e('Mang đến nhiều sản phẩm khác biệt, không ngừng cải tiến và cập nhật xu hướng làm đẹp mới', 'lavo') ?></p>
            </div>
        </div>
        <div class="owl-carousel owl-theme  home__special__slides">
            <?php
            foreach ($specials as $special) :
            ?>
                <a href="<?php echo $special['link'] ?>" title="<?php _e('thương hiệu lavox') ?>">
                    <img src="<?php echo IMAGE_THEMES . 'no-image-banner.png' ?>" data-src="<?php echo $special['image']['url'] ?>" height="710" width="1440" alt="<?php echo $special['image']['alt'] ?>" title="<?php echo $collection['image']['title'] ?>" class="lazy" />
                </a>
            <?php
            endforeach;
            ?>
        </div>
    </section>
<?php
endif;
?>
<?php
$collections = get_field('collections', $frontpage_id);
if ($collections) :
?>
    <section class="home__collections goteffect lazy" data-bg="<?php bloginfo('template_directory') ?>/images/logos-bg.png">
        <div class="container">
            <div class="common__bortit goteffect">
                <h2 class="common__bortit--tit goteffect"><?php _e('Dòng Sản Phẩm', 'lavo') ?> <span><?php _e('nổi bật', 'lavo'); ?></span></h2>
                <p class="common__bortit--des goteffect"><?php _e('Giải pháp của chúng tôi được thiết kế riêng cho từng cá nhân hiểu từng nhu cầu cụ thể', 'lavo') ?></p>
            </div>

            <div class="owl-carousel owl-theme home__collections__list goteffect">
                <?php
                foreach ($collections as $collection) :
                ?>
                    <a href="<?php echo $collection['link'] ?>" class="home__collections__item hvr-bounce-in" title="<?php _e('thương hiệu lavox') ?>">
                        <img src="<?php echo IMAGE_THEMES . 'no-image-logo-girl.png' ?>" data-src="<?php echo $collection['image']['url'] ?>" height="<?php echo $special['image']['height'] ?>" width="<?php echo $special['image']['width'] ?>" alt="<?php echo $collection['image']['alt'] ?>" title="<?php echo $collection['image']['title'] ?>" class="lazy" />
                    </a>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php
$about_Thumb = get_field('about_Thumb');
$about_title = get_field('about_title');
$about_description = get_field('about_description');
$about_block = get_field('about_block');
if ($about_Thumb && $about_title && $about_description) :
?>
    <section class="home__about goteffect lazy" data-bg="<?php echo CUS_PATH ?>/images/home-about-bg.png">
        <div class="container">
            <div class="home__about__flex">
                <div class="home__about__thumb goteffect">
                    <img src="<?php echo IMAGE_THEMES . 'no-image-logo-girl.png' ?>" width="535" height="505" data-src="<?php echo $about_Thumb ?>" class="lazy" title="<?php echo $about_title ?>" alt="<?php echo $about_title ?>" />
                </div>
                <div class="home__about__content goteffect">
                    <div class="common__bortit">
                        <h2 class="common__bortit--tit"><?php echo $about_title ?></span></h2>
                        <p class="common__bortit--des"><?php echo nl2br($about_description) ?></p>
                    </div>
                    <?php
                    if (have_rows('about_block', $frontpage_id)) :
                    ?>
                        <div class="home__about__content--flex">
                            <?php
                            while (have_rows('about_block', $frontpage_id)) : the_row();
                                $about_thumb__des = get_sub_field('description');
                            ?>
                                <div class="home__about__content--item">
                                    <img src="<?php echo IMAGE_THEMES . 'no-image-authour.png' ?>" width="71" height="66" data-src="<?php echo get_sub_field('image') ?>" class="lazy home__about__content--item--thumb" title="<?php echo $about_thumb__des ?>" alt="<?php echo $about_thumb__des ?>" />
                                    <p><?php echo nl2br($about_thumb__des) ?></p>
                                </div>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php
$args = [
    'numberposts'   => 16,
    'post_type'     => 'blog',
    'post_status'   => 'publish',
    'orderby'       => 'date',
    'order'         => 'DESC',
];
$blogs = get_posts($args);
if ($blogs) :
?>
    <section class="home__blog goteffect">

        <div class="common__bortit goteffect">
            <h2 class="common__bortit--tit goteffect"><?php _e('tin tức', 'lavo') ?> <span><?php _e('mới nhất', 'lavo'); ?></span></h2>
        </div>
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'blog-category',
            'hide_empty' => true,
        ));
        if ($terms) :
        ?>
            <div class="home__blog__term goteffect">
                <?php
                foreach ($terms as $cat) :
                ?>
                    <a href="<?php echo get_term_link($cat->term_id) ?>" class="home__blog__term--item" title="<?php echo $cat->name ?>">
                        <?php echo $cat->name ?>
                    </a>
                <?php
                endforeach;
                ?>
            </div>
        <?php
        endif;
        ?>
        <div class="container">
            <div class="home__blog__list goteffect">
                <?php
                foreach ($blogs as $post) : setup_postdata($post);
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
<?php
$args = [
    'numberposts'   => 16,
    'post_type'     => 'video',
    'post_status'   => 'publish',
    'orderby'       => 'date',
    'order'         => 'DESC',
];
$videos = get_posts($args);
if ($videos) :
?>
    <section class="home__video goteffect">
        <div class="container">
            <div class="common__bortit goteffect goteffect">
                <h2 class="common__bortit--tit goteffect"><?php _e('video', 'lavo') ?> <span><?php _e('mới nhất', 'lavo'); ?></span></h2>
            </div>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'video-category',
                'hide_empty' => true,
            ));
            if ($terms) :
            ?>
                <div class="home__video__term goteffect">
                    <?php
                    foreach ($terms as $cat) :
                    ?>
                        <a href="<?php echo get_term_link($cat->term_id) ?>" class="home__video__term--item" title="<?php echo $cat->name ?>">
                            <?php echo $cat->name ?>
                        </a>
                    <?php
                    endforeach;
                    ?>
                </div>
            <?php
            endif;
            ?>

            <div class="home__video__list goteffect">
                <?php
                foreach ($videos as $post) : setup_postdata($post);
                    $video_thumb = get_field('video_thumb', $post->ID);
                    $new_cate = get_the_terms($post->ID, 'video-category');
                ?>
                    <div class="home__video__item" title="<?php the_title() ?>">
                        <a href="<?php the_permalink() ?>" <?php the_title() ?> rel="nofollow" class="home__video__thumb">
                            <img src="<?php echo IMAGE_THEMES . 'no-image-banner.png' ?>" data-src="<?php echo $video_thumb ?>" class="lazy blog__detail__relateditem--image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="320" height="180" />
                        </a>
                        <a href="<?php the_permalink() ?>" <?php the_title() ?>>
                            <h3 class="home__video__item--tit" title="<?php the_title() ?>"><?php the_title() ?></h3>
                        </a>
                        <div class="home__video__item--des">
                            <time datetime="<?php echo get_the_date('Y-m-d h:m') ?>" class="home__blog__item--time"><?php echo get_the_date('d-m-Y') ?></time>
                            <?php if ($new_cate) : ?>
                                <a class="home__video__item--cate" href="<?php echo get_term_link($new_cate[0]->term_id, 'video-category') ?>" title="<?php echo $new_cate[0]->name ?>"><?php echo $new_cate[0]->name ?></a>
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
<?php
$count_background = get_field('count_background', $frontpage_id);
if (have_rows('count', $frontpage_id) && $count_background) :
?>
    <section class="home__count goteffect lazy" data-bg="<?php echo $count_background ?>">
        <div class="container">
            <div class="home__count__list">
                <?php
                while (have_rows('count', $frontpage_id)) : the_row();
                ?>
                    <div class="home__count__item goteffect">
                        <h4 class="home__count__item--tit">
                            <span class="home__count__item--tit--num"><?php echo number_format(get_sub_field('number')); ?></span>
                            <span class="home__count__item--tit--text"><?php echo get_sub_field('title'); ?></span>
                            <span class="home__count__item--tit--des"><?php echo get_sub_field('description'); ?></span>
                        </h4>
                    </div>
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
if (have_rows('Logo', $frontpage_id)) :
?>
    <section class="home__logos goteffect">
        <div class="container">
            <div class="owl-carousel owl-theme home__logos__flex goteffect">
                <?php
                while (have_rows('Logo', $frontpage_id)) : the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                ?>
                    <a href="<?php echo $link ?>" title="<?php echo $image['title'] ?>" class="hvr-bounce-in home__logos__item">
                        <img src="<?php echo IMAGE_THEMES . 'no-image-logo.png' ?>" data-src="<?php echo $image['url'] ?>" title="<?php echo $image['title'] ?>" width="760" height="400" alt="<?php echo $image['alt'] ?>" class="lazy">
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
get_footer();
?>