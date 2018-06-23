<?php

//create table quiz_users
function create_user_db() {
    global $wpdb;
    global $correct_count;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'quiz_users';

    $sql = "CREATE TABLE $table_name (
                        id TINYINT(50) NOT NULL AUTO_INCREMENT,
                        usr_id TINYINT(50) NOT NULL,
                        cor_ans TEXT,
                        PRIMARY KEY (id)
                ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

// inserting user values
function insert_user_score ($user_id, $data) {

    global $wpdb;
    global $correct_count;

    $table_name = $wpdb->prefix . 'quiz_users';


    $wpdb->insert(
        $table_name,
        [
            'id' => null,
            'usr_id' => $user_id,
            'cor_ans' => serialize( $data )
        ]
    );
}

function display_user_scores ($user_id) {

    global $wpdb;

    $table_name = $wpdb->prefix . 'quiz_users';

//    $wpdb->get_var("SELECT");
    $show = $wpdb->get_results("SELECT cor_ans FROM $table_name WHERE usr_id = $user_id order by id DESC");
    //wp_die(var_dump($show));

    return $show;
}

//wp_die(var_dump(maybe_unserialize( 'a:3:{s:7:"quiz_id";s:2:"76";s:10:"question_1";b:0;s:10:"question_2";b:1;}' )));
