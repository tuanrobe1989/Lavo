<?php
function getCurrentTerm(){
    if (!is_category() && !is_tag() && !is_tax())
        return false;
    $term_slug = get_query_var( 'term' );
    $taxonomyName = get_query_var( 'taxonomy' );
    return get_term_by( 'slug', $term_slug, $taxonomyName );
}
add_action('wp_footer','add_footer_content');
function add_footer_content(){
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-search.php'
    ));
    if($pages):
    ?>
        <div id="kpopup-search" class="kpopup">
            <span class="kpopup__bg"></span>
            <div class="container">
                <div class="kpopup__round">
                    <span class="kpopup__buttonclose lazy" data-bg="<?php bloginfo('template_directory')?>/images/icon-close.png"></span>
                    <div class="kpopup__title"><?php _e('nhập từ khóa của bạn','lavo') ?></div>
                    <form class="form__search" action="<?php echo get_permalink($pages[0]->ID); ?>" action="post">
                        <label for="search-key"><span class="form__search__text"><?php _e('từ khóa','lavo')?></span>
                        <input type="text" name="search-key" id="form__search__string" class="form__search__string" value="" />
                        </label>
                        <button class="form__search__button"><?php _e('tìm kiếm','lavo') ?></button>
                    </form>
                </div>
            </div>
        </div>
    <?php 
    endif;
    ?>
    <div id="kpopup-thanks" class="kpopup">
        <span class="kpopup__bg"></span>
        <div class="container">
            <div class="kpopup__round">
                <span class="kpopup__buttonclose lazy" data-bg="<?php bloginfo('template_directory')?>/images/icon-close.png"></span>
                <div class="kpopup__title"><?php _e('Thông Báo','lavo') ?></div>
                <p class="kpopup__thanks"><?php _e('Cám ơn bạn đăng ký, <br/>Shynh House sẽ liên hệ hổ trợ bạn ngay!','lavo') ?></p>
            </div>
        </div>
    </div>
    <div id="kpopup-warning" class="kpopup">
        <span class="kpopup__bg"></span>
        <div class="container">
            <div class="kpopup__round">
                <span class="kpopup__buttonclose lazy" data-bg="<?php bloginfo('template_directory')?>/images/icon-close.png"></span>
                <div class="kpopup__title"><?php _e('Thông Báo','lavo') ?></div>
                <p class="kpopup__thanks"><?php _e('Đã xảy ra sự cố <br/>vui lòng thử lại!','lavo') ?></p>
            </div>
        </div>
    </div>
    <?php
}

function get_top_term($term){
    if($term->parent != 0):
        $pre_term = get_term( $term->parent, 'product-category' );
        $term = get_top_term($pre_term);    
    endif;
    return $term;
}

function imageEncode($path){
    $path  = THEMES_DIR."/".$path;
    $image = file_get_contents($path);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $type  = $finfo->buffer($image);
    return "data:".$type.";charset=utf-8;base64,".base64_encode($image);
}

function imageEncodePath($path){
    $image = file_get_contents($path);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $type  = $finfo->buffer($image);
    return "data:".$type.";charset=utf-8;base64,".base64_encode($image);
}

function imageEncodeURL($path){
    $image = file_get_contents($path);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $type  = $finfo->buffer($image);
    return "data:".$type.";charset=utf-8;base64,".base64_encode($image);
}