<?php

function va_references_setup_post_type() {

	$args = array(
	'labels' => array(
		'name' => __('References'),
		'singular_name' => __('Reference'),
		'all_items' => __('All References'),
		'add_new_item' => __('Add New Reference'),
		'edit_item' => __('Edit Reference'),
		'view_item' => __('View Reference')
	),
	'public' => false,
	'publicly_queryable' => false,
	'has_archive' => true,
	'rewrite' => array('slug' => 'references'),
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'show_in_admin_bar' => true,
	'capability_type' => 'page',
	'supports' => array('title', 'editor', 'thumbnail'),
	'exclude_from_search' => true,
	'menu_position' => 20,
	'has_archive' => false,
	'menu_icon' => 'dashicons-laptop'
	);
	
	// https://codex.wordpress.org/Function_Reference/register_post_type
	register_post_type('va-references', $args);

}
add_action( 'init', 'va_references_setup_post_type' );





function va_references_install() {

    // trigger our function that registers the custom post type
    va_references_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();

}
register_activation_hook( __FILE__, 'va_references_install' );
