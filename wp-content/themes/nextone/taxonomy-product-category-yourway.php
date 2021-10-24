<?php
get_header();
$term = get_queried_object();
$term_description = term_description($term, "product-category");
$cate_i = 0;
?>

<section id="yourway__banner" class="yourway__banner lazy goteffect" data-bg="<?php echo get_bloginfo('template_directory').'/images/yourway/background1.webp'; ?>">
  <div class="container">
    <h1 title="yourway" class="yourway__banner__title goteffect"><img src="<?php echo get_bloginfo('template_directory').'/images/yourway/nomainLogo.png'; ?>" data-src="<?php echo get_bloginfo('template_directory').'/images/yourway/mainLogo.png'; ?>" title="Yourway" alt="Yourway" class="lazy" /></h1>
    <?php
    $yourway_intro_text = get_field('yourway_intro_text', $term);
    if ($yourway_intro_text) :
    ?>
      <div class="yourway__banner__des goteffect">
        <?php echo $yourway_intro_text ?>
      </div>
    <?php
    endif;
    ?>
    <ul class="owl-carousel owl-theme yourway__banner__slides">
      <a href="#yourway_cate_1" class="yourway__banner__item yourway__banner__item01 goteffect">
        <img src="<?php echo get_bloginfo('template_directory').'/images/yourway/nogirl1.png'; ?>" data-src="<?php echo get_bloginfo('template_directory').'/images/yourway/girl1.webp'; ?>" class="lazy" width="300" height="300" title="Yourway Professional" alt="Yourway Professional" />
        <strong class="yourway__banner__slides--tit"><?php _e('uốn duỗi', 'lavo') ?></strong>
      </a>
      <a href="#yourway_cate_2" class="yourway__banner__item yourway__banner__item02 goteffect">
        <img src="<?php echo get_bloginfo('template_directory').'/images/yourway/nogirl1.png'; ?>" data-src="<?php echo get_bloginfo('template_directory').'/images/yourway/girl2.webp'; ?>" class="lazy" width="300" height="300" title="Yourway Professional" alt="Yourway Professional" />
        <strong class="yourway__banner__slides--tit"><?php _e('nhuộm và tẩy tóc', 'lavo') ?></strong>
      </a>
      <a href="#yourway_cate_3" class="yourway__banner__item yourway__banner__item03 goteffect">
        <img src="<?php echo get_bloginfo('template_directory').'/images/yourway/nogirl1.png'; ?>" data-src="<?php echo get_bloginfo('template_directory').'/images/yourway/girl3.webp'; ?>" class="lazy" width="300" height="300" title="Yourway Professional" alt="Yourway Professional" />
        <strong class="yourway__banner__slides--tit"><?php _e('hấp dầu', 'lavo') ?></strong>
      </a>
    </ul>
  </div>
</section>

<?php
$yourway_curling_title = get_field('yourway_curling_title', $term);
$yourway_curling_description = get_field('yourway_curling_description', $term);
$yourway_curling_category = get_field('yourway_curling_category', $term);
if ($yourway_curling_title && $yourway_curling_description) :
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
        'terms'    => $yourway_curling_category->slug,
      )
    );
  endif;
  $postslist = get_posts($args);
  if ($postslist) :
    $cate_i++;
?>
    <section id="yourway_cate_<?php echo $cate_i ?>" class="yourway-highlight">
      <div class="container yourway-highlight__container">
        <h2 class="yourway-highlight__title"><?php echo $yourway_curling_title ?></h2>
        <div class="yourway-highlight__desc goteffect">
          <p><?php echo $yourway_curling_description ?></p>
        </div>
        <div id="yourway-highlight__slider" class="yourway-highlight__slider owl-carousel owl-theme">
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
            <div class="yourway-highlight__item">
              <div class="highlight__item">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="xpros__product__thumb lazy" />
                </a>
                <a href="<?php the_permalink(); ?>">
                  <h3 class="highlight__item__name"><?php the_title() ?></h3>
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
        </div>
      </div>
    </section>
<?php
  endif;
endif;
?>

<?php
$yourway_dye_title = get_field('yourway_dye_title', $term);
$yourway_dye_description = get_field('yourway_dye_description', $term);
$yourway_dye_category = get_field('yourway_dye_category', $term);
if ($yourway_dye_title && $yourway_dye_description) :
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
        'terms'    => $yourway_dye_category->slug,
      )
    );
  endif;
  $postslist = get_posts($args);
  if ($postslist) :
    $cate_i++;
?>
    <section id="yourway_cate_<?php echo $cate_i ?>" class="yourway-highlight type02 lazy goteffect" data-bg="<?php echo get_bloginfo('template_directory').'/images/yourway/background2.webp'; ?>">
      <div class="container yourway-highlight__container">
        <h2 class="yourway-highlight__title goteffect"><?php echo $yourway_dye_title ?></h2>
        <div class="yourway-highlight__desc goteffect">
          <p><?php echo $yourway_dye_description ?></p>
        </div>
        <div id="yourway-highlight__slider goteffect" class="yourway-highlight__slider owl-carousel owl-theme">
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
            <div class="yourway-highlight__item">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="yourway-highlight__item__img lazy" />
              </a>
              <a href="<?php the_permalink(); ?>">
                <h3 class="yourway-highlight__item__name"><?php the_title() ?></h3>
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
      </div>
      </div>
    </section>
<?php
  endif;
endif;
?>

<?php
$yourway_oiltreatment_title = get_field('yourway_oiltreatment_title', $term);
$yourway_oiltreatment_description = get_field('yourway_oiltreatment_description', $term);
$yourway_oiltreatment_category = get_field('yourway_oiltreatment_category', $term);
if ($yourway_oiltreatment_title && $yourway_oiltreatment_description) :
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
        'terms'    => $yourway_oiltreatment_category->slug,
      )
    );
  endif;
  $postslist = get_posts($args);
  if ($postslist) :
    $cate_i++;
?>
    <section id="yourway_cate_<?php echo $cate_i ?>" class="yourway-highlight lazy goteffect">
      <div class="container yourway-highlight__container">
        <h2 class="yourway-highlight__title goteffect"><?php echo $yourway_oiltreatment_title ?></h2>
        <div class="yourway-highlight__desc goteffect">
          <p><?php echo $yourway_oiltreatment_description ?></p>
        </div>
        <div id="yourway-highlight__slider goteffect" class="yourway-highlight__slider owl-carousel owl-theme">
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
            <div class="yourway-highlight__item">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php bloginfo('template_directory') ?>/images/no-image.webp" data-src="<?php echo $product_thumb[0] ?>" width="<?php echo $product_thumb[1] ?>" height="<?php echo $product_thumb[2] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="yourway-highlight__item__img lazy" />
              </a>
              <a href="<?php the_permalink(); ?>">
                <h3 class="yourway-highlight__item__name"><?php the_title() ?></h3>
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
      </div>
      </div>
    </section>
<?php
  endif;
endif;
?>

<?php get_footer() ?>