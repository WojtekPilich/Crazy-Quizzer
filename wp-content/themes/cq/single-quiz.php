<?php get_header(); ?>

    <div class="quiz-container">
        <p class="text">Zapraszam do zabawy w moim quizie!</p>

<!--        --><?php //if($answers) {
//            echo '<pre>' . var_dump($answers) . '</pre>';
//        } ?>

        <!-- main wp loop through  -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <form class="question-form" method="post">

            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
                <?php $count = 0; ?>

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
                        echo $question;
                        $count++;
                    ?>


                    <?php if( have_rows('answers') ):
                        while ( have_rows('answers') ) : the_row();
                            //grab answer subfield row
                            $answer_row = get_row();
                            echo $count;
//                            var_dump($answer_row, $question);
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

                                    echo '<label>';
                                    echo '<input type="radio" name="quiz_' . get_the_ID(). '_question_' . $count . '"value="'.$ans.'"class="answer"></input>';
                                    echo $ans . '</label>';
                                    echo '<br>';
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
                <br>
                <!-- end of question field loop -->
            <?php
                endwhile;
            else :
                echo 'nie znaleziono quizu, spróbuj ponownie wybrać lub zmienić kategorię!';
            endif;
        ?>

            <input type="hidden" name="quizz_id" value="<?php echo get_the_ID(); ?>"/>
            <button type="submit" name="submit">Pokaż liczbę poprawnych dopowiedzi</button>
            <br>
            <button type="submit" name="show">Pokaż poprawne odpowiedzi</button>
        </form>

            <?php
                echo '<br>';
                echo $result;
                echo $show;
            ?>

            <?php if ($_SERVER['REQUEST_METHOD'] === "POST") {
                if (isset($_POST['show'])) {

                    if( have_rows('questions') ):
                        while ( have_rows('questions') ) : the_row();

                            $ques = get_sub_field('question');
                            $corr = get_sub_field('correct');

                            echo $ques;
                            ?>

                            <section class="correct-body">

                            <?php if( have_rows('answers') ):
                                while ( have_rows('answers') ) : the_row();

                                    $ans_row = get_row();

                                    $filt = array_filter($ans_row, function ($element) {
                                        return is_string($element) && '' !== trim($element);
                                    });

                                    echo '<article class="correct-field">';
                                        foreach ($filt as $anss ) {
                                            if($anss == $corr) {
                                                echo '<span>' . $anss . '</span>';
                                            }
                                        }
                                    echo '<article>';
                                    echo '<br>';

                                endwhile;
                            else :
                            endif;
                            ?>

                            </section>

                        <?php endwhile;
                    else :
                    endif;
                }
            }
            ?>

            <!-- end of main wp loop -->
            <?php wp_reset_postdata(); ?>

        <?php endwhile; ?>
        <?php else: ?>
        <?php endif; ?>

        <?php include 'login-form.php' ?>

    </div>

<?php get_footer(); ?>