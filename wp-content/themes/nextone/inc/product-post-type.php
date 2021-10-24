<?php
add_image_size( 'product-thumb', 420, 420, true );
add_image_size( 'product-thumb-bottom', 420, 420, array( 'center', 'bottom' ) );
add_image_size( 'product-girl', 444, 488, true );
add_image_size( 'product-girl-bottom', 444, 488, array( 'center', 'bottom' ) );
add_image_size( 'product-detail', 600, 600, true );
add_image_size( 'product-detail-bottom', 600, 600, array( 'center', 'bottom' ) );
function product_post_type()
{
    $label = array(
        'name' => __('Sản Phẩm','lavo'), 
        'singular_name' => __('Sản Phẩm','lavo')
    );
 
    $args = array(
        'labels' => $label, 
        'description' =>  __('Post type Sản Phẩm','lavo'),
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
        'menu_icon' => 'dashicons-store', 
        'can_export' => true, 
        'has_archive' => false, 
        'exclude_from_search' => false, 
        'publicly_queryable' => true, 
        'rewrite' => array(
            'slug' => '.',
            'with_front' => false
        )
    );
 
    register_post_type('product', $args); 

    $taxonomylabels = array( 'name' => _x('Loại Sản Phẩm','lavo'),
        'singular_name' => _x('Loại Sản Phẩm','lavo'),
        'search_items' => __('Tìm loại Sản Phẩm', 'lavo'),
        'all_items' => __('Tất cả loại Sản Phẩm', 'lavo'),
        'edit_item' => __('Sửa loại Sản Phẩm', 'lavo'),
        'add_new_item' => __('Thêm loại mới', 'lavo'),
        'menu_name' => __('Loại Sản Phẩm', 'lavo'),
    );
    $args = array(
        'labels' => $taxonomylabels,
        'show_ui'           => true,
        'hierarchical'      => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
    register_taxonomy('product-category','product',$args);
 
}


add_action('init', 'product_post_type');

add_filter('request', 'rudr_change_product_category_request', 1, 1 );
 
function rudr_change_product_category_request($query){
 
	$tax_name = 'product-category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'
 
	// Request for child terms differs, we should make an additional check
	if( isset($query['attachment']) ):
		$include_children = true;
		$name = $query['attachment'];
	else:
		$include_children = false;
		$name = $query['name'] ?? null;
	endif;
 
 
	$term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists
 
	if (isset($name) && $term && !is_wp_error($term)): // check it here
 
		if( $include_children ) {
			unset($query['attachment']);
			$parent = $term->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $tax_name);
				$name = $parent_term->slug . '/' . $name;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}
 
		switch( $tax_name ):
			case 'category':{
				$query['category_name'] = $name; // for categories
				break;
			}
			case 'post_tag':{
				$query['tag'] = $name; // for post tags
				break;
			}
			default:{
				$query[$tax_name] = $name; // for another taxonomies
				break;
			}
		endswitch;
 
	endif;
 
	return $query;
 
}
 
 
add_filter( 'term_link', 'rudr_term_permalink', 10, 3 );
 
function rudr_term_permalink( $url, $term, $taxonomy ){
 
	$taxonomy_name = 'product-category'; // your taxonomy name here
	$taxonomy_slug = 'product-category'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )
 
	// exit the function if taxonomy slug is not in URL
	if ( strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name ) return $url;
 
	$url = str_replace('/' . $taxonomy_slug, '', $url);
 
	return $url;
}