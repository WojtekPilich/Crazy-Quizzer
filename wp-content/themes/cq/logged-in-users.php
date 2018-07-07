<?php
    //code for user who are logged in
    if ( is_user_logged_in() ) {
    //      creating table quiz_users
    create_user_db();
    // grab current user ID
    $user_id = get_current_user_id();
    // insert user score into database
    insert_user_score($user_id, $data);
    // display user results from database
    $results = display_user_scores($user_id);

    require 'views/logged-in-users.view.php';
}