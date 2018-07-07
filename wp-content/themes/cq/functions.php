<?php

require 'post-types/quiz.php';
require 'taxonomies/q-cat.php';
require 'lib/db.php';
require 'quizzer-role.php';

define("THEME_URI", get_template_directory_uri());

add_theme_support('menus');
add_theme_support('post-thumbnails');

function cq_styles_and_scripts() {
    wp_enqueue_style('main', THEME_URI . '/css/main.css', null, null, 'all');
    wp_enqueue_script('app', THEME_URI . '/js/app.js', ['jquery', 'slick_js'], '1.8.1', true);
    wp_enqueue_style('slick_css', THEME_URI . '/slick/slick.css');
    wp_enqueue_style('slick_css', THEME_URI . '/slick/slick-theme.css');
    wp_enqueue_script('slick_js', THEME_URI . '/slick/slick.min.js', ['jquery'], '', true);
}

add_action( 'wp_enqueue_scripts' , 'cq_styles_and_scripts' );

add_action('wp_logout','auto_redirect_after_logout');
    function auto_redirect_after_logout(){
    wp_redirect( home_url() );
    exit();
}




