<?php get_header(); ?>

    <div class="q-cat-container">


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!-- post -->
        <section class="q-cat-question">
            <h1><?php the_title(); ?></h1>
            <a href="<?php the_permalink(); ?>" class="">Rozwiąż quiz!</a>


            <?php
            if( have_rows('questions') ):
                // loop through the rows of data
                while ( have_rows('questions') ) : the_row();
                    $question = get_sub_field('question');
                ?>

                <?php endwhile;
            else:
            endif;
        ?>

        </section>


    <?php endwhile; ?>
      <!-- post navigation -->
    <?php else: ?>
      <!-- no posts found -->
    <?php endif; ?>

    </div>
<?php get_footer(); ?>
