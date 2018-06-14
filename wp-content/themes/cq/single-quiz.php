<?php get_header(); ?>
    <div class="quiz-container">
        <p class="text">Zapraszam do zabawy w moim quizie!</p>

        <!-- main wp loop through  -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>
            <img src="<?php the_field('image'); ?>" />
            <p><?php the_content(); ?></p>

        <!-- loop through field questions -->
        <?php if( have_rows('questions') ): ?>
            <?php while ( have_rows('questions') ) : the_row();

                $question = get_sub_field('question');

                //grab correct answer field
                $correct = get_sub_field('correct');
                ?>

                <!-- display question field values -->
                <section class="question-body">
                    <?php echo $question ?>

                    <?php if( have_rows('answers') ):
                        while ( have_rows('answers') ) : the_row();
                            //grab answer subfield row
                            $answer_row = get_row();
                            ?>

                            <!--removing empty strings from answers answers -->
                            <?php
                            $filtered = array_filter($answer_row, function ($element) {
                                return is_string($element) && '' !== trim($element);
                            });
                            ?>

                            <!-- displaying answers -->
                            <ul>
                                <?php foreach ($filtered as $ans) {
                                    //in answer is correct add data-id to it - makes js script easier
                                    if ($ans == $correct) {
                                        echo '<li class="answer" data-id="correct"><button>' . $ans . '</button></li>';
                                    } else {
                                        echo '<li class="answer"><button>' . $ans . '</button></li>';
                                    }
                                }
                                ?>
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
                echo 'nie znaleziono quizu, spróbuj ponownie wybrać lub zmienić kategorię!';
            endif;
        ?>

        <!-- end of main wp loop -->
            <?php wp_reset_postdata(); ?>

        <?php endwhile; ?>
        <?php else: ?>
        <?php endif; ?>

    </div>

<?php get_footer(); ?>
