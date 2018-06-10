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
        <header class="header">
            <nav class="nav">
                <a href="front-page.php" class="nav__logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/questions-3409194_640.png" alt="question mark"></a>
                <p class="nav__title">Witaj w Crazy Quizzer!</p>
                    <?php wp_nav_menu([
                            'menu' => 'main',
                            'menu_class' => 'nav__menu'
                    ]); ?>

            </nav>
        </header>
