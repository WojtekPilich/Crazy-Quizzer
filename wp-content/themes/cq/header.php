<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo( 'charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo(); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <?php wp_head(); ?>
        </head>
            <body>
                    <div class="main-cnt">
                        <header class="header">
                            <nav class="nav">
                                <a href="<?php echo site_url('/') ?>" class="nav__logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/Question-mark-orange.png" alt="question mark"></a>
                                <p class="nav__title">Witaj w Crazy Quizzer!</p>
                                    <?php wp_nav_menu([
                                            'menu' => 'main',
                                            'menu_class' => 'nav__menu'
                                        ]); ?>
                                <div class="login-register-btn">
                                    <a href="#"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/cdss-store-login-icon.png" alt=""></a>
                                </div>
                            </nav>
                        </header>
