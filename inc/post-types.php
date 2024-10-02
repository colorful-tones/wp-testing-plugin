<?php
add_action( 'init', 'demo_car_post_type', 0 );

// Register 'Car' Custom Post Type
function demo_car_post_type() {

	$labels = array(
		'name'                  => _x( 'Cars', 'Post Type General Name', 'demo' ),
		'singular_name'         => _x( 'Car', 'Post Type Singular Name', 'demo' ),
		'menu_name'             => __( 'Cars', 'demo' ),
		'name_admin_bar'        => __( 'Car', 'demo' ),
		'archives'              => __( 'Item Archives', 'demo' ),
		'attributes'            => __( 'Item Attributes', 'demo' ),
		'parent_item_colon'     => __( 'Parent Item:', 'demo' ),
		'all_items'             => __( 'All Items', 'demo' ),
		'add_new_item'          => __( 'Add New Item', 'demo' ),
		'add_new'               => __( 'Add New', 'demo' ),
		'new_item'              => __( 'New Item', 'demo' ),
		'edit_item'             => __( 'Edit Item', 'demo' ),
		'update_item'           => __( 'Update Item', 'demo' ),
		'view_item'             => __( 'View Item', 'demo' ),
		'view_items'            => __( 'View Items', 'demo' ),
		'search_items'          => __( 'Search Item', 'demo' ),
		'not_found'             => __( 'Not found', 'demo' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'demo' ),
		'featured_image'        => __( 'Featured Image', 'demo' ),
		'set_featured_image'    => __( 'Set featured image', 'demo' ),
		'remove_featured_image' => __( 'Remove featured image', 'demo' ),
		'use_featured_image'    => __( 'Use as featured image', 'demo' ),
		'insert_into_item'      => __( 'Insert into item', 'demo' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'demo' ),
		'items_list'            => __( 'Items list', 'demo' ),
		'items_list_navigation' => __( 'Items list navigation', 'demo' ),
		'filter_items_list'     => __( 'Filter items list', 'demo' ),
	);
	$args = array(
		'label'               => __( 'Car', 'demo' ),
		'description'         => __( 'Car type.', 'demo' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-car',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'car', $args );
}
