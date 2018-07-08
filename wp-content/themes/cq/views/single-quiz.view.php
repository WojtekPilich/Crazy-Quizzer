<?php ?>

    <div class="quiz-container">
        <div class="quiz-column">

        <!-- main wp loop through  -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <p class="quiz-title"><?php the_title(); ?></p>
            <p><?php the_content(); ?></p>
                <?php $count = 0; ?>

        <form class="question-form" method="post" action="<?php the_permalink(); ?>#test">

            <!-- loop through field questions -->
        <?php if( have_rows('questions') ): ?>
            <?php while ( have_rows('questions') ) : the_row();

                $question = get_sub_field('question');

                //grab correct answer field
                $correct = get_sub_field('correct');
                ?>
                <!-- display question field values -->
                <section class="question-body">
                    <?php
                        echo '<p class="question">' . $question . '</p>';
                        $count++;
                    ?>
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
                                <?php foreach ($filtered as $ans) : ?>
                                    <label class="label-radio">
                                    <?='<input type="radio" name="quiz_' . get_the_ID() . '_question_' . $count . '"value="' . $ans . '"class="answer"></input>'; ?>
                                    <span class="answer-text"> <?= $ans ?> </span>
                                    </label>
                                    <br>
                                <?php endforeach;?>
                        <!-- end of answer subfield loop -->
                        <?php
                        endwhile;
                    else :
                    endif;
                    ?>
                </section>
                <br>
                <!-- end of question field loop -->
            <?php
                endwhile;
            else :
                echo 'nie znaleziono quizu, spróbuj ponownie wybrać lub zmienić kategorię!';
            endif;
        ?>

            <input type="hidden" name="quizz_id" value="<?= get_the_ID();?>"/>

                <?php if(is_user_logged_in()) {
                    echo '<button class="quiz-btn" type="submit" name="submit">'
                        . 'Sprawdź historię swoich odpowiedzi' . '</button>';
                } else {
                    echo '<button class="quiz-btn" type="submit" name="submit">'
                        . 'Pokaż liczbę poprawnych odpowiedzi' . '</button>';
                }

                if(isset($_POST['submit'])) {
                    echo '<button class="quiz-btn" type="submit" name="show">' .'Pokaż poprawne odpowiedzi' . '</button>';
                }
                wp_nonce_field();
            ?>

        </form>

            <?php
                //insert history view
                get_template_part('show-correct-answers');
            ?>

            <?php if ($_SERVER['REQUEST_METHOD'] === "POST") {
                if (isset($_POST['show'])) {

                    echo  '<section id="test" class="correct-body">';

                    if( have_rows('questions') ):
                        while ( have_rows('questions') ) : the_row();

                            $ques = get_sub_field('question');
                            $corr = get_sub_field('correct');

                            echo '<p class="correct-quest">' . $ques . '</p>';
                            ?>

                            <?php if( have_rows('answers') ):
                                while ( have_rows('answers') ) : the_row();

                                    $ans_row = get_row();

                                    $filt = array_filter($ans_row, function ($element) {
                                        return is_string($element) && '' !== trim($element);
                                    });
                                        foreach ($filt as $anss ) {
                                            if($anss == $corr) {
                                                echo '<span class="correct-ans">' . $anss . '</span>';
                                            }
                                        }
                                    echo '<br>';

                                endwhile;
                            else :
                            endif;
                            ?>

                        <?php endwhile;
                    else :
                    endif;

                    echo '</section>';
                }
            }
            ?>

            <!-- end of main wp loop -->
            <?php wp_reset_postdata(); ?>

        <?php endwhile; ?>
        <?php else: ?>
        <?php endif; ?>

        <?php get_template_part('login-form') ?>

        </div>
    </div>