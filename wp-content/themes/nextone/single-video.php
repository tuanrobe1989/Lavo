<?php
global $blog_should;
get_header();
get_template_part('./components/breadcrums');
?>
<section class="blog__detail video__detail">
    <div class="container">
        <div class="common__flex">
            <div class="common__content">
                <h1 class="blog__detail__tit"><?php the_title() ?></h1>
                <?php the_content(); ?>
                <?php
                $blog_should = get_field('blog_should');
                if ($blog_should) :
                ?>
                    <strong class="blog__detail__subtit"><?php _e('Tin Nên Xem') ?></strong>
                    <div class="owl-carousel owl-theme blog__detail__postrelated">
                        <?php
                        foreach ($blog_should as $blog) :
                            $video = get_field('url', $blog->ID);
                            $video_thumb = get_field('video_thumb', $post->ID);
                        ?>
                            <div class="blog__detail__relateditem">
                                <figure>
                                    <a href="<?php the_permalink() ?>" title="<?php the_title()  ?>">
                                        <?php
                                        if (!$video) :
                                        ?>
                                            <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src="<?php echo $image[0] ?>" class="lazy blog__detail__relateditem--image" alt="<?php echo $blog->post_title ?>" title="<?php echo $blog->post_title ?>" />
                                        <?php
                                        else :
                                        ?>
                                            <div class="video__thumb">
                                                <img src="<?php echo CUS_PATH ?>images/no-image.png" data-src=<?php echo $video_thumb ?>" class="lazy blog__detail__relateditem--image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </a>
                                    <figcaption>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title()  ?>">
                                            <h3 class="blog__detail__relateditem--tit"><?php echo $blog->post_title ?></h3>
                                        </a>
                                    </figcaption>
                                </figure>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="common__sidebar">
                <?php dynamic_sidebar('video-sidbar'); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>