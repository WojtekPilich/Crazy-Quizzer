<?php get_header(); ?>

    <div class="main-cnt">
        <h1>Poniżej znajdziesz najnowsze quizy</h1>
        <br>
        <?php
        $q1 = new WP_Query([
            'post_type' => 'quiz',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'desc'
        ]); ?>
        <?php if ( $q1->have_posts() ) : while (  $q1->have_posts() ) : $q1->the_post(); ?>
          <!-- post -->
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <p><?php the_date(); ?></p>
            <a href="<?php the_permalink(); ?>" class="">Rozwiąż quiz!</a>
            <br>

            <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
          <!-- post navigation -->
        <?php else: ?>
          <!-- no posts found -->
        <?php endif; ?>

        <br>
        <?php wp_login_form(); ?>
        <p><a href="<?php echo wp_registration_url(); ?>">albo zarejestruj się</a></p>
    </div>

<?php get_footer(); ?>