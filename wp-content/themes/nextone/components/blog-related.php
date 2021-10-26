<?php
$blog_related = get_field('blog_related');
if ($blog_related) :


?>
  <div class="blog-related">
    <div class="blog-related__container">
      <div class="common__bortit">
        <strong class="h2 common__bortit--tit  none_desc">
          <span class="small_tit"><?php _e('Tin Liên Quan', 'lavo') ?> </span>
          <br>
          <?php _e('Bạn Nên Đọc', 'lavo') ?>
        </strong>
      </div>
      <div class="blog-related__list">
        <?php
        foreach ($blog_related as $post) : setup_postdata($post);
          $imageid = get_field('image');
          $image_url = wp_get_attachment_image_url($imageid, 'medium');
        ?>
          <div class="blog-related__item">
            <div class="blog-related__item__img-inner">
              <a href="<?php the_permalink(); ?>" class="blog-related__item__img-link">
                <figure class="blog-related__item__img-wrapper">
                  <img src="<?php echo get_template_directory_uri() . "/images/blog_related_no_image.png"; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="blog-related__item__img lazy" width="180p" height="180" data-src="<?php echo $image_url; ?>">
                </figure>
              </a>
            </div>
            <div class="blog-related__item__info">

              <a href="<?php the_permalink(); ?>" class="blog-related__item__info__title"><?php the_title(); ?></a>
              <div class="blog-related__item__info__content"><?php the_excerpt(); ?> </div>
              <div class="blog-related__item__info__footer">
                <div class="blog-related__item__info__date"><img src="<?php echo get_template_directory_uri() . "/images/calendar_lavo.png"; ?>" alt="">
                  <time datetime="<?php echo get_the_date('Y-m-d h:m') ?>" class="blog-related__item__info__date--detail"><?php echo get_the_date('d-m-Y') ?></time>
                </div>
                <a href="<?php the_permalink(); ?>" class="blog_related__item__info__readmore">
                  <span class="blog-related__item__info__readmore-icon"></span>
                  <span class="blog-related__item__info__readmore-desc"><?php _e('Đọc thêm', 'lavo') ?></span>
                </a>
              </div>
            </div>
          </div>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>



      </div>
    </div>
  </div>

<?php
endif;
?>