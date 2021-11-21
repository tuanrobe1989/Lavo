<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
$gentleman_intro_text = get_field('gentleman_intro_text', $term);
?>


<section id="gentleman-header" class="gentleman-header goteffect lazy">
  <picture class="gentleman-header__background">
    <source media="(min-width:1200px)" srcset="<?php echo imageEncode('/images/gentleman/Genlement3.png'); ?>">
    <source media="(min-width:992px)" srcset="<?php echo imageEncode('/images/gentleman/Genlement1.png'); ?>">
    <source media="(min-width:768px)" srcset="<?php echo imageEncode('/images/gentleman/Genlement2.png'); ?>">
    <img src="<?php echo imageEncode('/images/gentleman/Genlement2.png'); ?>" alt="Gentleman">
  </picture>

  <ul class="gentleman-header__nav goteffect">
    <li class="gentleman-header__item">
      <a href="#gentleman-brand" class="gentleman-header__item__link"><?php _e('GIỚI THIỆU', 'lavo') ?></a>
    </li>
    <li class="gentleman-header__item">
      <a href="#gentleman-highlight" class="gentleman-header__item__link"><?php _e('SẢN PHẨM NỔI BẬT', 'lavo') ?></a>
    </li>
    <li class="gentleman-header__item">
      <a href="#gentleman-question" class="gentleman-header__item__link"><?php _e('HỎI ĐÁP', 'lavo') ?></a>
    </li>
  </ul>
</section>

<?php
$gentleman_introduction_title = get_field('gentleman_introduction_title', $term);
$gentleman_introduction_desc = get_field('gentleman_introduction_desc', $term);
$gentleman_introduction_image = get_field('gentleman_introduction_image', $term);
if ($gentleman_introduction_title && $gentleman_introduction_desc && $gentleman_introduction_image) :
?>

  <section id="gentleman-brand" class="gentleman-brand goteffect">
    <div class="container gentleman-brand__container">
      <h2 class="gentleman-brand__title goteffect"><?php echo $gentleman_introduction_title; ?></h2>
      <div class="gentleman-brand__img-info-wrapper">
        <div class="gentleman-brand__img-wrapper goteffect">
          <img src="<?php echo imageEncode('/images/gentleman/nomansLeft.png'); ?>" data-src="<?php echo $gentleman_introduction_image;  ?>" alt="Gentleman" title="Gentleman" class="gentleman-brand__img lazy">
        </div>
        <div class="gentleman-brand__info goteffect">
          <div class="gentleman-brand__info__desc">
            <?php echo $gentleman_introduction_desc; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
endif;
?>

<?php

$gentleman_highlight_title = get_field('gentleman_highlight_title', $term);
$gentleman_highlight_category = get_field('gentleman_highlight_category', $term);

if ($gentleman_highlight_title && $gentleman_highlight_category) :
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
        'terms'    => $gentleman_highlight_category->slug,
      )
    );
  endif;
  $postslist = get_posts($args);
?>

  <section id="gentleman-highlight" class="gentleman-highlight goteffect">
    <div class="container gentleman-highlight__container">
      <h2 class="gentleman-highlight__title goteffect"><?php echo $gentleman_highlight_title; ?></h2>
      <?php
      if ($postslist) :
      ?>
        <div id="gentleman-highlight__slider" class="gentleman-highlight__slider goteffect owl-carousel owl-theme">
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

            <div class="gentleman-highlight__item">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="gentleman-highlight__item__img lazy" />
              </a>
              <a href="<?php the_permalink(); ?>">
                <h3 class="gentleman-highlight__item__name"><?php the_title() ?></h3>
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
$gentleman_qa_title = get_field('gentleman_qa_title', $term);

if (have_rows('gentleman_fqa', $term)) :
?>

  <section id="gentleman-question" class="gentleman-question goteffect">
    <div class="container gentleman-question__container">
      <h2 class="gentleman-question__title goteffect"><?php echo $gentleman_qa_title; ?></h2>
      <div class="gentleman-question__question-answer-wrapper">
        <ul class="gentleman-question__question goteffect">
          <?php
          $answers = '';
          $answer_tab_i = 0;
          while (have_rows('gentleman_fqa', $term)) : the_row();
            $answer_tab_i++;
            $question = get_sub_field('question');
            $answer = get_sub_field('answer');
            if ($question && $question) :
          ?>
              <li class="gentleman-question__item-wrapper">
                <div class="gentleman-question__item">
                  <span class="gentleman-question__item-question"><?php echo $question; ?></span>
                </div>
                <div class="gentleman-question__item-answer">
                  <?php echo $answer; ?>
                </div>
              </li>

          <?php
            endif;
          endwhile;
          ?>
        </ul>
        <?php echo $answers; ?>
      </div>
    </div>
  </section>

<?php
endif;
?>

<?php get_footer(); ?>