<?php

require 'post-types/quiz.php';
require 'taxonomies/q-cat.php';

define("THEME_URI", get_template_directory_uri());

add_theme_support('menus');
add_theme_support('post-thumbnails');

//Add popper
//    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], null, true);
//    //Add bootstrap
//    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], null, true);
//
//    //Add bootstrap styles
//    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
//

    //styles
function cq_enqueue_style() {
    wp_enqueue_style('main', THEME_URI . '/css/main.css', null, null, 'all');
}
    //scripts
function cq_enqueue_script() {
    wp_enqueue_script('app', THEME_URI . '/js/app.js', ['jquery'], null, true);
}

add_action( 'wp_enqueue_scripts' , 'cq_enqueue_style' );
add_action( 'wp_enqueue_scripts' , 'cq_enqueue_script' );


