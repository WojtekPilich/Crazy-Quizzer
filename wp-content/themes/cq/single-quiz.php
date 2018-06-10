<?php get_header(); ?>
    <div class="quiz-container">
        <p class="text">Zapraszam do zabawy w moim quizie!</p>

        <!-- main wp loop through  -->
        <?php if ( have_posts() ) : while ( have_posts() ) :    the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>

        <!-- loop through field questions -->
        <?php if( have_rows('questions') ): ?>
            <?php while ( have_rows('questions') ) : the_row();
                $image = get_field('image');
                $question = get_sub_field('question'); ?>

                <!-- display question field values -->
                <section class="quiz-body">
                    <?php echo $question ?>

                    <?php if( have_rows('answers') ):
                        while ( have_rows('answers') ) : the_row();
                            //grab answer subfield row
                            $answer_row = get_row(); ?>

                            <!-- take correct answer -->
                            <?php
                            $correct = array_pop($answer_row);
                            echo '<span class="hidden">' . $correct . '</span>'
                            ?>

                            <!--display answers -->
                            <ul>
                                <?php foreach ($answer_row as $rrr) {
                                    echo '<li class="answer"><button>' . $rrr . '</button></li>';
                                } ?>
                            </ul>

                        <!-- end of answer subfield loop -->
                        <?php
                        endwhile;
                    else :
                    endif;
                    ?>
                </section>
                <!-- end of question field loop -->
            <?php
                endwhile;
            else :
                echo 'nie znaleziono quizu, spróbuj ponownie wybrać kategorię!';
            endif;
        ?>

        <!-- end of main wp loop -->
        <?php endwhile; ?>
            <!-- post navigation -->
        <?php else: ?>
            <!-- no posts found -->
        <?php endif; ?>
    </div>

<?php get_footer(); ?>
