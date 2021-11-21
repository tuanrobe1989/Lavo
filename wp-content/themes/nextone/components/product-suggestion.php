<?php
$product_suggestions = get_field('product_suggestion');

if ($product_suggestions) :

?>

  <div class="kpopup animate__animated animate__fadeIn">
    <span class="kpopup__bg"></span>
    <div class="container">
      <div class="product-suggestion kpopup__round">
        <span class="kpopup__buttonclose lazy" data-bg="<?php bloginfo('template_directory') ?>/images/icon-close.png"></span>
        <div class="common__bortit">
          <strong class="h2 common__bortit--tit  none_desc product-suggestion__title">
            <span class="small_tit"><?php _e('Sản Phẩm', 'lavo') ?> </span>
            <br>
            <?php _e('Dành Cho Bạn', 'lavo') ?>
          </strong>
        </div>
        <ul class="product-suggestion__slider owl-carousel owl-theme">
          <?php foreach ($product_suggestions as $post) : setup_postdata($post);
            $imageid = get_field('image');
            $image_url = wp_get_attachment_image_url($imageid, 'medium'); ?>
            <li class="product-suggestion__item">
              <div class="product-suggestion__item__wrapper">
                <a href="<?php the_permalink(); ?>" class="product-suggestion__item__img-link">
                  <figure class="product-suggestion__item__img-wrapper">
                    <img src="<?php echo get_template_directory_uri() . "/images/blog_related_no_image.png"; ?>" data-src="<?php echo $image_url ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="260" height="350" class="product-suggestion__item__img lazy">
                  </figure>
                </a>
                <div class="product-suggestion__item__info">
                  <?php
                  $curterm = get_the_terms($post, 'product-category');
                  $parent_term = get_top_term($curterm[0]);
                  ?>
                  <div class="product-suggestion__item__term">
                    <strong class="product-suggestion__item__term-desc"><?php echo $parent_term->name ?></strong>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="product-suggestion__item__name h4"><strong><?php the_title(); ?></strong></a>
                </div>
              </div>
            </li>
          <?php
          endforeach;
          wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
  </div>

<?php
endif;
?>