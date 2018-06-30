<?php get_header(); ?>

    <div class="q-cat-container">
        <div class="q-cat-wrapper">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <section class="q-cat-question">

                <h2 class="q-cat-title"><?php the_title(); ?></h2>

                <div class="overflow">
                    <a class="q-cat-image" href="<?php the_permalink(); ?>">
                        <img class="q-cat-image__img" src="<?php the_field('image'); ?>" alt="q-cat img">
                    </a>
                </div>

            </section>

        <?php endwhile; ?>
      <!-- post navigation -->
    <?php else: ?>
      <!-- no posts found -->
    <?php endif; ?>

        </div>
    </div>

<?php get_footer(); ?>
