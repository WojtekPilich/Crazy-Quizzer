<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo( 'charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo(); ?></title>
    <?php wp_head(); ?>
</head>
    <body>
        <div class="dim">
            <div class="main-cnt">
                <header class="header">
                    <nav class="nav">
                        <a href="<?php echo site_url('/') ?>" class="nav__logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/question_mark_PNG96.png" alt="question mark"></a>
                        <p class="nav__title">Witaj w Crazy Quizzer!</p>
                            <?php wp_nav_menu([
                                    'menu' => 'main',
                                    'menu_class' => 'nav__menu'
                                ]); ?>
                        <div class="login-register-btn">
                            <a href="#"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/user_access-512.png" alt=""></a>
                        </div>
                    </nav>
                </header>
