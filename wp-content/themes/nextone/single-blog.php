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
      </div>
      <?php echo do_action('blog_related'); ?>
      <div class="common__sidebar">
        <?php dynamic_sidebar('sidebar-primary'); ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>