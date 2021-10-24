<?php

/**
 * Lavo Coporation Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Lavo Coporation-dev-team
 * @since Lavo Coporation Template 1.0
 */

/**
 * Lavo Coporation Template only works in WordPress 7 or later.
 */
define('CUS_PATH', "/ctcplavo/");
define('IMAGE_THEMES', get_bloginfo('template_directory') . '/images/');
include get_theme_file_path('/inc/finfo.class.php');
include get_theme_file_path('/inc/common.php');
include get_theme_file_path('/inc/block-post-type.php');
include get_theme_file_path('/inc/product-post-type.php');
include get_theme_file_path('/inc/blog-post-type.php');
include get_theme_file_path('/inc/video-post-type.php');

add_action('wp_head', 'custom_wp_head');
add_action('admin_head', 'custom_wp_head');
function custom_wp_head()
{
    echo '<link rel="shortcut icon" type="image/png" href="' . get_template_directory_uri() . '/images/favicon.png">';
}
//SET UP INIT
add_filter('widget_text', 'do_shortcode');
add_action('init', 'init_function');
function init_function()
{
    add_theme_support('title-tag');
    register_nav_menu('header-menu', __('Header Menu'));
    //add_image_size( 'header-item-image', 486, 300, true );
}

//SETTINGS THEMES
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    show_admin_bar(false);
}

//ADD SCRIPTS
function add_theme_scripts()
{
    global $post;
    wp_enqueue_style('font-style', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap', array(), '1.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css', array(), '1.0', 'all');
    if (is_front_page()) :
        wp_enqueue_style('home-style', get_template_directory_uri() . '/css/top.min.css', array(), '1.0', 'all');
    endif;
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), 1.1, true);
    if (is_page_template('page-contact.php')) :
        wp_enqueue_style('contact-style', get_template_directory_uri() . '/css/contact.min.css', array(), '1.0', 'all');
        wp_register_script('contact-script', get_template_directory_uri() . '/js/contact.min.js', array('jquery'), 1.1, true);
        $global_params = array(
            'ajaxurl' => admin_url('admin-ajax.php')
        );
        wp_localize_script('contact-script', 'global_params', $global_params);
        wp_enqueue_script('contact-script');
    endif;
    if (is_page_template('page-odm.php')) :
        wp_enqueue_style('odm-style', get_template_directory_uri() . '/css/odm.min.css', array(), '1.0', 'all');
        wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/add-ons/owl.carousel.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('odm-script', get_template_directory_uri() . '/js/odm.min.js', array('jquery'), 1.1, true);
    endif;
    if (is_tax()) :
        $term = get_queried_object();
        if ($term->slug == 'lavox') :
            if (is_term('lavox', 'product-category')) :
                wp_enqueue_style('lavox-brand-style', get_template_directory_uri() . '/css/lavox.min.css', array(), '1.0', 'all');
                wp_enqueue_script('lavox-brand-script', get_template_directory_uri() . '/js/lavox.min.js', array('jquery'), 1.1, true);
            endif;
        endif;
        if ($term->slug == 'x-pros') :
            if (is_term('x-pros', 'product-category')) :
                wp_enqueue_style('x-pros-brand-style', get_template_directory_uri() . '/css/x-pros.min.css', array(), '1.0', 'all');
                wp_enqueue_script('x-pros-brand-script', get_template_directory_uri() . '/js/x-pros.min.js', array('jquery'), 1.1, true);
            endif;
        endif;
        if ($term->slug == 'm-pros') :
            if (is_term('m-pros', 'product-category')) :
                wp_enqueue_style('m-pros-brand-style', get_template_directory_uri() . '/css/m-pros.min.css', array(), '1.0', 'all');
                wp_enqueue_script('m-pros-brand-script', get_template_directory_uri() . '/js/m-pros.min.js', array('jquery'), 1.1, true);
            endif;
        endif;
        if ($term->slug == 'sebas') :
            if (is_term('sebas', 'product-category')) :
                wp_enqueue_style('sebas-brand-style', get_template_directory_uri() . '/css/sebas.min.css', array(), '1.0', 'all');
                wp_enqueue_script('sebas-brand-script', get_template_directory_uri() . '/js/sebas.min.js', array('jquery'), 1.1, true);
            endif;
        endif;
        if ($term->slug == 'lavox-gentleman') :
            wp_enqueue_style('lavox-gentleman-brand-style', get_template_directory_uri() . '/css/lavox-gentleman.min.css', array(), '1.0', 'all');
            wp_enqueue_script('lavox-gentleman-brand-script', get_template_directory_uri() . '/js/lavox-gentleman.min.js', array('jquery'), 1.1, true);
        endif;
        if ($term->slug == 'wazzi') :
            wp_enqueue_style('wazzi-brand-style', get_template_directory_uri() . '/css/wazzi.min.css', array(), '1.0', 'all');
            wp_enqueue_script('wazzi-brand-script', get_template_directory_uri() . '/js/wazzi.min.js', array('jquery'), 1.1, true);
        endif;
        if ($term->slug == 'spaline') :
            wp_enqueue_style('spaline-brand-style', get_template_directory_uri() . '/css/spaline.min.css', array(), '1.0', 'all');
            wp_enqueue_script('spaline-brand-script', get_template_directory_uri() . '/js/spaline.min.js', array('jquery'), 1.1, true);
        endif;
        if ($term->slug == 'nowkon') :
            wp_enqueue_style('nowkon-brand-style', get_template_directory_uri() . '/css/nowkon.min.css', array(), '1.0', 'all');
            wp_enqueue_script('nowkon-brand-script', get_template_directory_uri() . '/js/nowkon.min.js', array('jquery'), 1.1, true);
        endif;
        if ($term->slug == 'yourway') :
            wp_enqueue_style('yourway-brand-style', get_template_directory_uri() . '/css/yourway.min.css', array(), '1.0', 'all');
            wp_enqueue_script('yourway-brand-script', get_template_directory_uri() . '/js/yourway.min.js', array('jquery'), 1.1, true);
        endif;
    endif;
    if (is_singular('product')) :
        $curterm = get_the_terms($post, 'product-category');
        $parent_term = get_top_term($curterm[0]);
        if ($parent_term->slug == 'lavox') :
            wp_enqueue_style('lavox-single-style', get_template_directory_uri() . '/css/lavox-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'sebas') :
            wp_enqueue_style('sebas-single-style', get_template_directory_uri() . '/css/sebas-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'x-pros') :
            wp_enqueue_style('x-pros-single-style', get_template_directory_uri() . '/css/x-pros-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'm-pros') :
            wp_enqueue_style('m-pros-single-style', get_template_directory_uri() . '/css/m-pros-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'yourway') :
            wp_enqueue_style('yourway-single-style', get_template_directory_uri() . '/css/yourway-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'spaline') :
            wp_enqueue_style('spaline-single-style', get_template_directory_uri() . '/css/spaline-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'nowkon') :
            wp_enqueue_style('nowkon-single-style', get_template_directory_uri() . '/css/nowkon-single.min.css', array(), '1.0', 'all');
        endif;
        if ($parent_term->slug == 'wazzi') :
            wp_enqueue_style('wazzi-single-style', get_template_directory_uri() . '/css/wazzi-single.min.css', array(), '1.0', 'all');
        endif;
    endif;
    if (is_page_template('page-brand.php')) :
        wp_enqueue_style('product-style', get_template_directory_uri() . '/css/product.min.css', array(), '1.0', 'all');
    // wp_enqueue_style( 'materialize-style', get_template_directory_uri().'/css/add-ons/materialize.min.css', array(), '1.0', 'all' );
    // wp_enqueue_script( 'materialize-script', get_template_directory_uri() . '/js/add-ons/materialize.min.js', array ( 'jquery' ), 1.1, true);
    endif;
    if ((is_singular('product') || is_post_type_archive('product') || is_tax('product-category') || is_page_template('page-brand.php'))) :
        wp_enqueue_style('product-style', get_template_directory_uri() . '/css/product.min.css', array(), '1.0', 'all');
        wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/add-ons/owl.carousel.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('product-script', get_template_directory_uri() . '/js/product.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('match-height-script', get_template_directory_uri() . '/js/add-ons/jquery.matchHeight.min.js', array('jquery'), 1.1, true);

    endif;
    if (is_singular('blog') || is_post_type_archive('blog') || is_tax('blog-category') || is_page_template('page-search.php') || is_tag()) :
        wp_enqueue_style('blog-style', get_template_directory_uri() . '/css/blog.min.css', array(), '1.0', 'all');
        wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/add-ons/owl.carousel.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('blog-script', get_template_directory_uri() . '/js/blog.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('match-height-script', get_template_directory_uri() . '/js/add-ons/jquery.matchHeight.min.js', array('jquery'), 1.1, true);
    endif;
    if (is_singular('video') || is_post_type_archive('video') || is_tax('video-category')) :
        wp_enqueue_style('blog-style', get_template_directory_uri() . '/css/blog.min.css', array(), '1.0', 'all');
        wp_enqueue_script('blog-script', get_template_directory_uri() . '/js/blog.min.js', array('jquery'), 1.1, true);
        wp_enqueue_style('video-style', get_template_directory_uri() . '/css/video.min.css', array(), '1.0', 'all');
        wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/add-ons/owl.carousel.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('video-script', get_template_directory_uri() . '/js/video.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('match-height-script', get_template_directory_uri() . '/js/add-ons/jquery.matchHeight.min.js', array('jquery'), 1.1, true);
    endif;
    if (is_page(52)) :
        wp_enqueue_style('about-style', get_template_directory_uri() . '/css/about.min.css', array(), '1.0', 'all');
        wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/add-ons/owl.carousel.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('about-script', get_template_directory_uri() . '/js/about.min.js', array('jquery'), 1.1, true);
    endif;
    if (is_front_page()) :
        wp_enqueue_script('top-script', get_template_directory_uri() . '/js/top.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('match-height-script', get_template_directory_uri() . '/js/add-ons/jquery.matchHeight.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/add-ons/owl.carousel.min.js', array('jquery'), 1.1, true);
    // wp_enqueue_style( 'materialize-style', get_template_directory_uri().'/css/add-ons/materialize.min.css', array(), '1.0', 'all' );
    // wp_enqueue_script( 'materialize-script', get_template_directory_uri() . '/js/add-ons/materialize.min.js', array ( 'jquery' ), 1.1, true);
    endif;
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');

function wpdocs_theme_slug_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Footer Sidebar', 'lavo'),
        'id'            => 'sidebar-footer',
        'description'   => __('Widgets display in footer', 'lavo'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<strong class="footer__title">',
        'after_title'   => '</strong>',
    ));
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'lavo'),
        'id'            => 'sidebar-primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="common__sidebar__tit">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Video Sidebar', 'lavo'),
        'id'            => 'video-sidbar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="common__sidebar__tit">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'wpdocs_theme_slug_widgets_init');

function custom_widget_menu($atts)
{
    return wp_nav_menu(
        array(
            'menu_class' => 'footer__menu',
            'menu' => $atts['id'],
            'echo' => false
        )
    );
}

add_shortcode('nextone_menu', 'custom_widget_menu');

class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu
{

    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        // Depth-dependent classes.
        $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
        $display_depth = ($depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ($display_depth % 2  ? 'menu-odd' : 'menu-even'),
            ($display_depth >= 2 ? 'sub-sub-menu' : ''),
            'menu-depth-' . $display_depth
        );
        $class_names = implode(' ', $classes);

        // Build HTML for output.
        if ($depth == 0) :
            $output .= "\n" . $indent . '<div class="header__menu__subround"><div class="container"><ul class="' . $class_names . '">' . "\n";
        else :
            $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
        endif;
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) :
            $output .= "$indent</ul></div></div>\n";
        else :
            $output .= "$indent</ul>\n";
        endif;
    }

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            ($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
            ($depth >= 2 ? 'sub-sub-menu-item' : ''),
            ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        // Passed classes.
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // Link attributes.
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';

        // Build HTML output and pass through the proper filter.
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

function gp_parse_request_trick($query)
{

    // Only noop the main query
    if (!$query->is_main_query())
        return;

    // Only noop our very specific rewrite rule match
    if (2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if (!empty($query->query['name'])) {
        $query->set('post_type', array('post', 'page', 'product', 'blog', 'video'));
    }
}
add_action('pre_get_posts', 'gp_parse_request_trick');

add_action("wp_ajax_pushmail", "pushmail");
add_action("wp_ajax_nopriv_pushmail", "pushmail");
function pushmail()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], "pushmail_nonce")) {
        exit("Some wrong !");
    }
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result['type'] = 'false';
        $name = $_REQUEST["name"];
        $phone =  trim($_REQUEST["phone"]);
        $phone = preg_replace('/^[ \t]*[\r\n]+/m', '', $phone);
        $email = trim($_REQUEST["email"]);
        $message = nl2br(trim($_REQUEST["message"]));
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) :
            $to = get_option('admin_email');
            $subject = __('Nội Dung Liên Hệ Từ Website', 'lavo');
            $headers[] = 'Content-Type: text/html; charset=UTF-8';
            $headers[] = 'From: ' . $name . ' <' . $email . '>';
            $flag = wp_mail($to, $subject, $message, $headers);
            if ($flag) :
                $result['type'] = 'success';
            endif;
            $result = json_encode($result);
        else :
            $result['type'] = 'failed';
        endif;
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    die();
}

//Add webp support

add_filter('upload_mimes', 'my_myme_types', 1, 1);
function my_myme_types($mime_types)
{
    $mime_types['webp'] = 'image/webp';
    return $mime_types;
}

function prefix_myfunction()
{ ?>
    <meta name="theme-color" content="#000000" />
<?php }
add_action('wp_head', 'prefix_myfunction');
