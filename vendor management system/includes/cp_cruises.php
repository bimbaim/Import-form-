<?php
// Register Custom Post Type Cruise
// Post Type Key: cruise
function create_cruise_cpt() {

	$labels = array(
		'name' => __( 'Cruises', 'Post Type General Name', 'core' ),
		'singular_name' => __( 'Cruise', 'Post Type Singular Name', 'core' ),
		'menu_name' => __( 'Cruises', 'core' ),
		'name_admin_bar' => __( 'Cruise', 'core' ),
		'archives' => __( 'Cruise Archives', 'core' ),
		'attributes' => __( 'Cruise Attributes', 'core' ),
		'parent_item_colon' => __( 'Parent Cruise:', 'core' ),
		'all_items' => __( 'All Cruises', 'core' ),
		'add_new_item' => __( 'Add New Cruise', 'core' ),
		'add_new' => __( 'Add New', 'core' ),
		'new_item' => __( 'New Cruise', 'core' ),
		'edit_item' => __( 'Edit Cruise', 'core' ),
		'update_item' => __( 'Update Cruise', 'core' ),
		'view_item' => __( 'View Cruise', 'core' ),
		'view_items' => __( 'View Cruises', 'core' ),
		'search_items' => __( 'Search Cruise', 'core' ),
		'not_found' => __( 'Not found', 'core' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'core' ),
		'featured_image' => __( 'Featured Image', 'core' ),
		'set_featured_image' => __( 'Set featured image', 'core' ),
		'remove_featured_image' => __( 'Remove featured image', 'core' ),
		'use_featured_image' => __( 'Use as featured image', 'core' ),
		'insert_into_item' => __( 'Insert into Cruise', 'core' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Cruise', 'core' ),
		'items_list' => __( 'Cruises list', 'core' ),
		'items_list_navigation' => __( 'Cruises list navigation', 'core' ),
		'filter_items_list' => __( 'Filter Cruises list', 'core' ),
	);
	$args = array(
		'label' => __( 'Cruise', 'core' ),
		'description' => __( 'Our Cruises', 'core' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-sos',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'cruise', $args );

}
add_action( 'init', 'create_cruise_cpt', 0 );