<?php get_header(); ?>

            <?php
            $q1 = new WP_Query([
                'post_type' => 'quiz',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'desc'
            ]);

            require 'views/front-page.view.php' ?>

<?php get_footer(); ?>