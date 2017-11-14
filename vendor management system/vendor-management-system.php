<?php
/*
Plugin Name: Vendor management system
Plugin URI: http://kvconsultant.com
Description: Vendor management system
Version:1.0
Author:KVDC
Author URI: http://kvconsultant.com
Plugin Type: Piklist
License:  GPL2
*/

include_once 'includes/class-import-vendor.php';

if (!defined('ABSPATH'))
  {
    exit;
  }


add_filter('piklist_post_types', 'vendor_management_post_types');

  function vendor_management_post_types()
  {
		
		$labels = array(
		'name' => __( 'Vendors', 'Post Type General Name', 'vendor_management' ),
		'singular_name' => __( 'Vendor', 'Post Type Singular Name', 'vendor_management' ),
		'menu_name' => __( 'Vendor Management', 'vendor_management' ),
		'name_admin_bar' => __( 'Vendor Management', 'vendor_management' ),
		'archives' => __( 'Vendor Archives', 'vendor_management' ),
		'attributes' => __( 'Vendor Attributes', 'vendor_management' ),
		'parent_item_colon' => __( 'Parent Vendor:', 'vendor_management' ),
		'all_items' => __( 'All Vendors', 'vendor_management' ),
		'add_new_item' => __( 'Add New Vendor', 'vendor_management' ),
		'add_new' => __( 'Add New', 'vendor_management' ),
		'new_item' => __( 'New Vendor', 'vendor_management' ),
		'edit_item' => __( 'Edit Vendor', 'vendor_management' ),
		'update_item' => __( 'Update Vendor', 'vendor_management' ),
		'view_item' => __( 'View Vendor', 'vendor_management' ),
		'view_items' => __( 'View Vendors', 'vendor_management' ),
		'search_items' => __( 'Search Vendor', 'vendor_management' ),
		'not_found' => __( 'Not found', 'vendor_management' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'vendor_management' ),
		'featured_image' => __( 'Featured Image', 'vendor_management' ),
		'set_featured_image' => __( 'Set featured image', 'vendor_management' ),
		'remove_featured_image' => __( 'Remove featured image', 'vendor_management' ),
		'use_featured_image' => __( 'Use as featured image', 'vendor_management' ),
		'insert_into_item' => __( 'Insert into Vendor', 'vendor_management' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Vendor', 'vendor_management' ),
		'items_list' => __( 'Vendors list', 'vendor_management' ),
		'items_list_navigation' => __( 'Vendors list navigation', 'vendor_management' ),
		'filter_items_list' => __( 'Filter Vendors list', 'vendor_management' ),
	);
	
    $post_types['vendor_management'] = array(
      'labels' => $labels
      ,'title' => __('Enter a new vendor name')
      ,'menu_icon' => 'dashicons-sos'
      ,'hierarchical' => true
      ,'taxonomies' => array()
      ,'show_ui' => true
	  ,'show_in_menu' => true
	  ,'menu_position' => 5
	  ,'show_in_admin_bar' => true
	  ,'show_in_nav_menus' => true
	  ,'show_in_rest' => true
	  ,'publicly_queryable' => true
      ,'supports' => array(
        'title'
        ,'post-formats'
        ,'page-attributes'
        ,'excerpt'
        ,'revisions'
        ,'custom-fields'
        
      )
      ,'public' => true
      ,'admin_body_class' => array(
        'piklist-demonstration'
        ,'piklist-sample'
      )
      ,'has_archive' => true
      ,'rewrite' => array(
        'slug' => 'vendor-management'
      )
      ,'capability_type' => 'post'
      ,'edit_columns' => array(
        'title' => __('Vendor Name')
    
      )
      ,'hide_meta_box' => array(
        'slug'
        ,'author'
        ,'title'
      )
      ,'status' => array(
        'new' => array(
          'label' => 'New Vendor'
          ,'public' => false
        )
        ,'draft' => array(
			'label' => 'Draft'
			,'public' => 'false'
        )
        ,'pending' => array(
          'label' => 'Pending Review'
          ,'public' => false
        )
        ,'need-revision' => array(
			'label' => 'Need Revision'
        )
        ,'lock' => array(
          'label' => 'Lock'
          ,'public' => true
        )
        ,'finish' => array(
			'label' => 'Finish'
			,'public' => true
			)
    ));
	
	return $post_types;
           
  }
  

 add_filter('piklist_admin_pages', 'vendor_management_admin_pages');
  function vendor_management_admin_pages($pages)
  {
    $pages[] = array(
      'page_title' => __('Import Vendor')
      ,'menu_title' => __('Import Vendor', 'vendor_management')
      ,'sub_menu' => 'edit.php?post_type=vendor_management'
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'vendor_management_import'
      ,'menu_icon' => piklist('url', 'piklist') . '/parts/img/piklist-icon.png'
      ,'page_icon' => piklist('url', 'piklist') . '/parts/img/piklist-page-icon-32.png'
      
    );

    return $pages;
  }


function subcon_c_head($defaults) {
	$column_name = 'subcon';//column slug
	$column_heading = 'Sub Contractor';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}

add_filter('manage_vendor_management_posts_columns', 'subcon_c_head');

function email_c_head($defaults) {
	$column_name = 'email';//column slug
	$column_heading = 'Email';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}
 

function email_c_content($name, $post_ID) {
    $column_name = 'email';//column slug	
    $column_field = 'email';//field slug	
    if ($name == $column_name) {
        $post_meta = get_post_meta($post_ID,$column_field,true);
        if ($post_meta) {
            echo $post_meta;
        }
    }
}


add_filter('manage_vendor_management_posts_columns', 'email_c_head');
add_action('manage_vendor_management_posts_custom_column', 'email_c_content', 10, 2);



function address_c_head($defaults) {
	$column_name = 'address';//column slug
	$column_heading = 'address';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}

function address_c_content($name, $post_ID) {
    $column_name = 'address';//column slug	
    $column_field = 'address';//field slug	
    if ($name == $column_name) {
        $post_meta = get_post_meta($post_ID,$column_field,true);
        if ($post_meta) {
            echo $post_meta;
        }
    }
}


add_filter('manage_vendor_management_posts_columns', 'address_c_head');
add_action('manage_vendor_management_posts_custom_column', 'address_c_content', 10, 2);



function status_c_head($defaults) {
	$column_name = 'status';//column slug
	$column_heading = 'Status';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}
 

function status_c_content($name, $post_ID) {
    $column_name = 'status';//column slug	
    $column_field = 'status';//field slug	
    if ($name == $column_name) {
         $post_meta = get_post_status_object( get_post_status($post_ID, $column_field,true) );
        if ($post_meta) {
            echo  $post_meta->label;
        }
    }
}


add_filter('manage_vendor_management_posts_columns', 'status_c_head');
add_action('manage_vendor_management_posts_custom_column', 'status_c_content', 10, 2);


function send_c_head($defaults) {
	$column_name = 'send';//column slug
	$column_heading = 'Send Form';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}

function send_c_content($name, $post_ID) {
    $column_name = 'send';//column slug	
    $column_field = 'send';//field slug	
    if ($name == $column_name) {
        echo '<button class="button" onclick="myFunction()">Send Form</button>'; ?>
        <script>
		function myFunction() {
			var txt;
			if (confirm("Choose who will fill the form") == true) {
				txt = "You pressed OK!";
			} else {
				txt = "You pressed Cancel!";
			}
			document.getElementById("demo").innerHTML = txt;
		}
		</script>
		<?php
        }
    }


add_filter('manage_vendor_management_posts_columns', 'send_c_head');
add_action('manage_vendor_management_posts_custom_column', 'send_c_content', 10, 2);




add_filter( 'manage_edit-vendor_management_sortable_columns', 'vendor_management_sortable_columns' );
function vendor_management_sortable_columns( $columns ) {

	$columns['email'] = 'email';
	$columns['address'] = 'address';
	$columns['status'] = 'status';

	return $columns;
}



?>
