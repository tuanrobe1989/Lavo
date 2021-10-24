<?php
/* Template Name: Search Page */
    get_header();
    get_template_part('./components/breadcrums');
?>
<section class="blog__detail">
    <div class="container">
        <div class="common__flex">
            <div class="common__content">
                <?php 
                    $paged = get_query_var('paged');
                    $search__string = $_GET['key'];
                    $args = array(
                        'paged' => $paged,
                        'orderby' => 'DESC',
                        'posts_per_page' => 20,
                        'post_type' => array('post','page','blog','video','product'),
                        's' => trim($search__string)
                    );
                    $query = new WP_Query( $args );
                ?>
                <h1 class="blog__detail__tit"><?php the_title() ?>: <?php echo $search__string ?></h1>
                <?php 
                if($query):
                    while ($query->have_posts()) : $query->the_post();
                ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="blog__detail__searchtit">
                        <h3><?php the_title() ?></h3>
                    </a>
                <?php 
                    endwhile;
                    $count_pages = ceil($query->found_posts / 20);
                    if($count_pages > 0):
                        wp_paginate(array('pages' => $count_pages, 'page' => $paged));
                    endif;
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