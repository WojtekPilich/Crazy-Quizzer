
    <section class="main-slider">

        <?php if ( $q1->have_posts() ) : while (  $q1->have_posts() ) : $q1->the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="slider-link">
                <span class="slider-title"><?php the_title(); ?></span>
                <img class="slider-img" src="<?php the_field('image'); ?>" alt="slider-img">
            </a>

            <?php wp_reset_postdata(); ?>

        <?php endwhile; ?>
        <?php else: ?>
        <?php endif; ?>

    </section>
    <?php get_template_part('login-form') ?>

</div>