<?php get_header(); ?>
        <span class="begin">Wybierz jeden z najnowszych quizów!</span>
        <br>
            <?php
            $q1 = new WP_Query([
                'post_type' => 'quiz',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'desc'
            ]); ?>

            <section class="main-slider">
            <?php if ( $q1->have_posts() ) : while (  $q1->have_posts() ) : $q1->the_post(); ?>
              <!-- post -->
                    <a href="<?php the_permalink(); ?>" class="slider-link">
                        <span class="slider-title"><?php the_title(); ?></span>
                        <img class="slider-img" src="<?php the_field('image'); ?>" alt="slider-img">
                    </a>

                <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
              <!-- post navigation -->
            <?php else: ?>
              <!-- no posts found -->
            <?php endif; ?>
        </section>
        <?php include 'login-form.php' ?>
    </div>

<?php get_footer(); ?>