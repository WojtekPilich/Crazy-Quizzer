<?php

/**
 * Registers the `quiz` post type.
 */
function quiz_init() {
	register_post_type( 'quiz', array(
		'labels'                => array(
			'name'                  => __( 'Quizzes', 'cq' ),
			'singular_name'         => __( 'Quiz', 'cq' ),
			'all_items'             => __( 'All Quizzes', 'cq' ),
			'archives'              => __( 'Quiz Archives', 'cq' ),
			'attributes'            => __( 'Quiz Attributes', 'cq' ),
			'insert_into_item'      => __( 'Insert into quiz', 'cq' ),
			'uploaded_to_this_item' => __( 'Uploaded to this quiz', 'cq' ),
			'featured_image'        => _x( 'Featured Image', 'quiz', 'cq' ),
			'set_featured_image'    => _x( 'Set featured image', 'quiz', 'cq' ),
			'remove_featured_image' => _x( 'Remove featured image', 'quiz', 'cq' ),
			'use_featured_image'    => _x( 'Use as featured image', 'quiz', 'cq' ),
			'filter_items_list'     => __( 'Filter quizzes list', 'cq' ),
			'items_list_navigation' => __( 'Quizzes list navigation', 'cq' ),
			'items_list'            => __( 'Quizzes list', 'cq' ),
			'new_item'              => __( 'New Quiz', 'cq' ),
			'add_new'               => __( 'Add New', 'cq' ),
			'add_new_item'          => __( 'Add New Quiz', 'cq' ),
			'edit_item'             => __( 'Edit Quiz', 'cq' ),
			'view_item'             => __( 'View Quiz', 'cq' ),
			'view_items'            => __( 'View Quizzes', 'cq' ),
			'search_items'          => __( 'Search quizzes', 'cq' ),
			'not_found'             => __( 'No quizzes found', 'cq' ),
			'not_found_in_trash'    => __( 'No quizzes found in trash', 'cq' ),
			'parent_item_colon'     => __( 'Parent Quiz:', 'cq' ),
			'menu_name'             => __( 'Quizzes', 'cq' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'quiz',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'quiz_init' );

/**
 * Sets the post updated messages for the `quiz` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `quiz` post type.
 */
function quiz_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['quiz'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Quiz updated. <a target="_blank" href="%s">View quiz</a>', 'cq' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'cq' ),
		3  => __( 'Custom field deleted.', 'cq' ),
		4  => __( 'Quiz updated.', 'cq' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Quiz restored to revision from %s', 'cq' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Quiz published. <a href="%s">View quiz</a>', 'cq' ), esc_url( $permalink ) ),
		7  => __( 'Quiz saved.', 'cq' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Quiz submitted. <a target="_blank" href="%s">Preview quiz</a>', 'cq' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Quiz scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview quiz</a>', 'cq' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Quiz draft updated. <a target="_blank" href="%s">Preview quiz</a>', 'cq' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'quiz_updated_messages' );
