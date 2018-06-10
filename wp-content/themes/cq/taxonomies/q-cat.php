<?php

/**
 * Registers the `q_cat` taxonomy,
 * for use with 'quiz'.
 */
function q_cat_init() {
	register_taxonomy( 'q-cat', array( 'quiz' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Q cats', 'cq' ),
			'singular_name'              => _x( 'Q cat', 'taxonomy general name', 'cq' ),
			'search_items'               => __( 'Search Q cats', 'cq' ),
			'popular_items'              => __( 'Popular Q cats', 'cq' ),
			'all_items'                  => __( 'All Q cats', 'cq' ),
			'parent_item'                => __( 'Parent Q cat', 'cq' ),
			'parent_item_colon'          => __( 'Parent Q cat:', 'cq' ),
			'edit_item'                  => __( 'Edit Q cat', 'cq' ),
			'update_item'                => __( 'Update Q cat', 'cq' ),
			'view_item'                  => __( 'View Q cat', 'cq' ),
			'add_new_item'               => __( 'New Q cat', 'cq' ),
			'new_item_name'              => __( 'New Q cat', 'cq' ),
			'separate_items_with_commas' => __( 'Separate q cats with commas', 'cq' ),
			'add_or_remove_items'        => __( 'Add or remove q cats', 'cq' ),
			'choose_from_most_used'      => __( 'Choose from the most used q cats', 'cq' ),
			'not_found'                  => __( 'No q cats found.', 'cq' ),
			'no_terms'                   => __( 'No q cats', 'cq' ),
			'menu_name'                  => __( 'Q cats', 'cq' ),
			'items_list_navigation'      => __( 'Q cats list navigation', 'cq' ),
			'items_list'                 => __( 'Q cats list', 'cq' ),
			'most_used'                  => _x( 'Most Used', 'q-cat', 'cq' ),
			'back_to_items'              => __( '&larr; Back to Q cats', 'cq' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'q-cat',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'q_cat_init' );

/**
 * Sets the post updated messages for the `q_cat` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `q_cat` taxonomy.
 */
function q_cat_updated_messages( $messages ) {

	$messages['q-cat'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Q cat added.', 'cq' ),
		2 => __( 'Q cat deleted.', 'cq' ),
		3 => __( 'Q cat updated.', 'cq' ),
		4 => __( 'Q cat not added.', 'cq' ),
		5 => __( 'Q cat not updated.', 'cq' ),
		6 => __( 'Q cats deleted.', 'cq' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'q_cat_updated_messages' );
