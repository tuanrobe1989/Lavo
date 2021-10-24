<?php

/**
 * @package WordPress
 * @subpackage lavo-dev-team
 * @since version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>><span class="toppoint"></span>
    <header class="header">
        <span class="header__buttonmb"><span></span><span></span><span></span></span>
        <div class="container">
            <div class="header__flex">
                <a href="<?php bloginfo('home') ?>" class="header__logo">
                    <img src="<?php bloginfo('template_directory') ?>/images/logo.png" alt="<?php bloginfo('name') ?>" title="<?php bloginfo('name') ?>" height="41" width="141"/>
                </a>
                <?php
                wp_nav_menu(
                    array(
                        'menu_class' => 'header__menu',
                        'theme_location' => 'header-menu',
                        'walker' => new WPDocs_Walker_Nav_Menu()
                    )
                );
                ?>
                <div class="header__right">
                    <span class="header__search buttonpopup" data-id="kpopup-search">
                        <img src="<?php echo IMAGE_THEMES.'no-image-flag.png'?>" data-src="<?php echo IMAGE_THEMES.'icon-search.png'?>" alt="<?php _e('search', 'lavo') . ' - ' . bloginfo('name') ?>" title="<?php _e('search', 'lavo') . ' - ' . bloginfo('name') ?>"  width="16" height="16" class="lazy">
                    </span>
                    <span class="header__flags">
                        <img src="<?php echo IMAGE_THEMES.'no-image-flag.png'?>" data-src="<?php echo IMAGE_THEMES.'flag-viet-nam.png'?>" alt="<?php _e('viet nam', 'lavo') . ' - ' . bloginfo('name') ?>" title="<?php _e('viet nam', 'lavo') . ' - ' . bloginfo('name') ?>" width="21" height="16" class="lazy"/>
                        <img src="<?php echo IMAGE_THEMES.'no-image-flag.png'?>" data-src="<?php echo IMAGE_THEMES.'flag-uk.png'?>" alt="<?php _e('english', 'lavo') . ' - ' . bloginfo('name') ?>" title="<?php _e('english', 'lavo') . ' - ' . bloginfo('name') ?>"  width="21" height="16" class="lazy"/>
                    </span>
                </div>
            </div>
        </div>
    </header>