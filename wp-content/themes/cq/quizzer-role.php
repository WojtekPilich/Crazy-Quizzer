<?php

//  add quizzer role
function add_quizzer_role () {
    add_role( 'quizzer', 'Quizzer',
        [
            'read' => true,
            'edit_posts' => true,
            'edit_others_posts' => false,
            'edit_published_posts' => true,
            'delete_published_posts' => true,
            'delete_posts' => true,
            'delete_others_posts' => false,
            'publish_posts' => true,
            'upload_files' => true,
            'manage_categories' => true
        ]
    );
}

//add_action( 'init', 'add_quizzer_role' );

//remove_role('quizzer');