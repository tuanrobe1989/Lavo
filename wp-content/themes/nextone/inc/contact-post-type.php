<?php

function contact_post_type()
{


    $label = array(
        'name' => __('Liên Hệ', 'lavo'),
        'singular_name' => __('Liên Hệ', 'lavo')
    );

    $args = array(
        'labels' => $label,
        'description' =>  __('Quản Lý Danh Mục Liên Hệ', 'lavo'),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields',
            'post-format'
        ),
        'show_in_rest' => true,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-feedback',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,

    );

    register_post_type('contact', $args);

    $taxonomylabels = array(
        'name' => _x('Phân Loại Liên Hệ', 'Loại liên hệ của contact', 'lavo'),
        'singular_name' => _x('Loại Liên Hệ', 'Loại sản phẩm của contact', 'lavo'),
        'search_items' => __('Tìm loại Liên Hệ', 'lavo'),
        'all_items' => __('Tất cả loại Liên Hệ', 'lavo'),
        'edit_item' => __('Sửa loại Liên Hệ', 'lavo'),
        'add_new_item' => __('Thêm loại Liên Hệ mới', 'lavo'),
        'menu_name' => __('Loại Liên Hệ', 'lavo'),
    );
    $args = array(
        'labels' => $taxonomylabels,
        'show_ui'           => true,
        'hierarchical'      => true,
        'show_in_rest' => true,
    );
    register_taxonomy('contact-category', 'contact', $args);
}


add_action('init', 'contact_post_type');


//Shortcode - Containt HTML for submit form
add_shortcode('contact_form_footer','contact_form_footer');
function contact_form_footer(){
ob_start();
?>
<form method="POST" class="contactForm" id="footer_contact" name="footer_contact">
  <div class="contactForm__wrapper"><input type="text" class="contactForm__input contactForm__name"
      placeholder="Họ và Tên liên hệ">
  </div>
  <div class="contactForm__wrapper"><input type="text" class="contactForm__input contactForm__phone"
      placeholder="Số điện thoại">
  </div>
  <div class="contactForm__wrapper"><input type="email" class="contactForm__input contactForm__email"
      placeholder="E-mail">
  </div>
  <div class="contactForm__area-wrapper">
    <input type="submit" value="Đăng Ký" class="contactForm__submit">
  </div>
  <input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce('add_contact_nonce') ?>" />
  <input type="hidden" class="contactForm__term" value="1075" />

</form>
<?php
    return ob_get_clean();
}


//Initial the ajax method 
add_action("wp_ajax_add_contact", "add_contact");
add_action("wp_ajax_nopriv_add_contact", "add_contact");

function add_contact()
{
    ob_start();
    $result['type'] = 'false';
    $result['msg'] = __('Đã có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại sau.','lavo');

    if (!wp_verify_nonce($_REQUEST['nonce'], "add_contact_nonce")) {
        $result['error'] = 'Some wrong !';
    }
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $name = $_REQUEST["name"];
        $email = trim($_REQUEST["email"]);
        $phone = trim($_REQUEST["phone"]);
        $formname = trim($_REQUEST["formname"]);
        $termID = trim($_REQUEST["termID"]);


        $post_data = array(
            'post_title'    => wp_strip_all_tags( $formname.' - '.$phone ),
            'post_status'   => 'publish',
            'post_type'     => 'contact'
        );
        $post_id = wp_insert_post($post_data);
        if($post_id):
            if ( ! add_post_meta( $post_id, 'contact__email', $email, true ) ):
                update_post_meta ( $post_id, 'contact__email', $email );
                update_post_meta ( $post_id, 'contact__form', $formname );                
                wp_set_object_terms( $post_id, 1075, 'contact-category' );
            endif;
            $result['type'] = 'success';
            $result['msg'] = __('Bạn đã đăng ký khuyến mãi thành công, chúng tôi sẽ liên hệ bạn sớm nhất có thể','lavo');
        endif;
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }


    die();
    ob_end_flush();
}

add_action('wp_footer', 'add_footer_popup');
function add_footer_popup(){
?>
<div id="kpopup__common" class="kpopup">
  <span class="kpopup__bg"></span>
  <div class="container">
    <div class="kpopup__round">
      <span class="kpopup__buttonclose lazy"
        data-bg="<?php bloginfo('template_directory')?>/images/icon-close.png"></span>
      <div class="kpopup__title"><?php _e('Thông Báo','lavo') ?></div>
      <p class="kpopup__common__desc">

      </p>
    </div>
  </div>
</div>
<?php 
}