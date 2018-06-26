<?php

require 'post-types/quiz.php';
require 'taxonomies/q-cat.php';
require 'lib/db.php';
require 'quizzer-role.php';
require 'show-correct-answers.php';

define("THEME_URI", get_template_directory_uri());

add_theme_support('menus');
add_theme_support('post-thumbnails');

//    //styles
//function cq_enqueue_style() {
//    wp_enqueue_style('main', THEME_URI . '/css/main.css', null, '', 'all');
//}
//    //js scripts
//function cq_enqueue_script() {
//    wp_enqueue_script('app', THEME_URI . '/js/app.js', ['jquery'], '', true);
//}
//    //add slick
//function cq_slick () {
//    wp_enqueue_style('slick_css', THEME_URI . '/slick/slick.css');
//    wp_enqueue_style('slick_css', THEME_URI . '/slick/slick-theme.css');
//    wp_enqueue_script('slick_js', THEME_URI . '/slick/slick.min.js', ['jquery'], '', true);
//}
//
//add_action( 'wp_enqueue_scripts' , 'cq_enqueue_style' );
//add_action( 'wp_enqueue_scripts' , 'cq_enqueue_script' );
//add_action( 'wp_enqueue_scripts', 'cq_slick' );


function cq_styles_and_scripts() {
    wp_enqueue_style('main', THEME_URI . '/css/main.css', null, null, 'all');
    wp_enqueue_script('app', THEME_URI . '/js/app.js', ['jquery', 'slick_js'], '1.8.1', true);
    wp_enqueue_style('slick_css', THEME_URI . '/slick/slick.css');
    wp_enqueue_style('slick_css', THEME_URI . '/slick/slick-theme.css');
    wp_enqueue_script('slick_js', THEME_URI . '/slick/slick.min.js', ['jquery'], '', true);
}

add_action( 'wp_enqueue_scripts' , 'cq_styles_and_scripts' );




