<?php

//checking post method of answer form
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit']) && isset($_POST['quizz_id'])) {

        $answers = [];
        $correct_count = 0;

        $data = [
            'quiz_id' => $_POST['quizz_id']
        ];

        $qs = get_field('questions', intval($_POST['quizz_id']));

        if (have_rows('questions', intval($_POST['quizz_id']))):
            $count = 0;

            while (have_rows('questions', intval($_POST['quizz_id']))) : the_row();

                $count++;
                $current_answer = 'quiz_' . $_POST['quizz_id'] . '_question_' . $count;

                $corr = get_sub_field('correct');

                if ($corr === $_POST[$current_answer]) {
                    $answers[] = true;
                    $correct_count++;
                    $data['question_' . $count] = true;
                } else {
                    $answers[] = false;
                    $data['question_' . $count] = false;
                }

            endwhile;
        else :
        endif;

        require 'views/show-correct-answers.view.php';
        require 'logged-in-users.php';
    }
}

