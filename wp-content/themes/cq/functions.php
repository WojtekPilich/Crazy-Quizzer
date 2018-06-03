<?php

define("THEME_URI", get_stylesheet_directory_uri());

add_theme_support('menus');
add_theme_support('post-thumbnails');

function main_scripts()
{
    //Add popper
    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], null, true);
    //Add bootstrap
    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], null, true);

    //Add bootstrap styles
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    wp_enqueue_script('js', get_stylesheet_directory_uri() . '/js/main.js', ['jquery'], null, true);

    wp_enqueue_style('main', THEME_URI . '/css/main.css', ['bootstrap'], '1.0.0', 'all');
}

add_action( 'wp_enqueue_scripts' , 'main_scripts' );