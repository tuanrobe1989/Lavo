<?php
global $blog_should;
get_header();
get_template_part('./components/breadcrums');
$post_id = get_the_id();
?>
<section class="blog__detail">
    <div class="container">
        <div class="common__flex">
            <div class="common__content">
                <h1 class="blog__detail__tit"><?php the_title() ?></h1>
                <?php the_content(); ?>

                <?php ?>
                <?php
                $tags = get_the_tags($post_id);
                if ($tags) :
                ?>
                    <ul class="blog__tag">
                        <li class="blog__tag__tit"><?php _e('Danh Mục Liên Quan', 'lavo') ?>: </li>
                        <?php
                        foreach ($tags as $tag) :
                        ?>
                            <li>
                                <a href="<?php echo get_tag_link($tag->term_id) ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                                <span>, </span>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                <?php
                endif;
                ?>
                <?php
                $blog_should = get_field('blog_should');
                if ($blog_should) :
                ?>
                    <strong class="blog__detail__subtit"><?php _e('Tin Tức Nên Xem') ?></strong>
                    <div class="owl-carousel owl-theme blog__detail__postrelated">
                        <?php
                        foreach ($blog_should as $blog) :
                            $video = get_field('url', $blog->ID);
                            preg_match('/src="(.+?)"/', $video, $matches_url);
                            $src = $matches_url[1];
                            preg_match('/embed(.*?)?feature/', $src, $matches_id);
                            $id = $matches_id[1];
                            $id = str_replace(str_split('?/'), '', $id);
                            if (!$video) :
                                $image_id = get_field('image', $blog->ID);
                                $image = wp_get_attachment_image_src($image_id, 'blog-thumb-intro');
                            endif;
                        ?>
                            <a href="<?php the_permalink() ?>" class="blog__detail__relateditem">
                                <figure>
                                    <?php
                                    if (!$video) :
                                    ?>
                                        <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" class="lazy blog__detail__relateditem--image" alt="<?php echo $blog->post_title ?>" title="<?php echo $blog->post_title ?>" />
                                    <?php
                                    else :
                                    ?>
                                        <div class="video__thumb">
                                            <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="http://img.youtube.com/vi/<?php echo $id; ?>/mqdefault.jpg" class="lazy blog__detail__relateditem--image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                        </div>
                                    <?php
                                    endif;
                                    ?>
                                    <figcaption>
                                        <h3 class="blog__detail__relateditem--tit"><?php echo $blog->post_title ?></h3>
                                    </figcaption>
                                </figure>
                            </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="common__sidebar">
                <?php dynamic_sidebar('sidebar-primary'); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>