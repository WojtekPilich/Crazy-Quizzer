<?php

require 'post-types/quiz.php';
require 'taxonomies/q-cat.php';
require 'lib/answer-correct.php';
require 'lib/db.php';

define("THEME_URI", get_template_directory_uri());

add_theme_support('menus');
add_theme_support('post-thumbnails');

    //styles
function cq_enqueue_style() {
    wp_enqueue_style('main', THEME_URI . '/css/main.css', null, null, 'all');
}
    //js scripts
function cq_enqueue_script() {
    wp_enqueue_script('app', THEME_URI . '/js/app.js', ['jquery'], null, true);
}

add_action( 'wp_enqueue_scripts' , 'cq_enqueue_style' );
add_action( 'wp_enqueue_scripts' , 'cq_enqueue_script' );


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
//                          echo 'prawidłowa odpowiedź';
                    } else {
                        $answers[] = false;
                        $data['question_' . $count] = false;
//                          echo 'nieprawidłowa odpowiedź';
                    }
            endwhile;
        else :
        endif;
//        wp_die($correct_count);
        $result = "Liczba poprawnych odpowiedzi: $correct_count";


//      code for user who are logged in
        if ( is_user_logged_in() ) {
//      creating table quiz_users
           create_user_db();

            $user_id = get_current_user_id();

            insert_user_score($user_id, $data);

            $results = display_user_scores($user_id);

//            wp_die(var_dump($results));

            foreach ($results as $res) {
                //echo '<pre>' . var_dump(maybe_unserialize($res->cor_ans)) . '</pre>';
                $uns = maybe_unserialize($res->cor_ans);

                $out = '';
                $out .= '<table>';
                $out .= '<tr>';
                $out .= '<th>Pytanie</th>';
                $out .= '<th>Wynik:</th>';
                $out .= '</tr>';

                $cnt = 0;
                foreach ($uns as $un => $u) {
                    //echo $un . " " . $u . '<br>';

                    if($un === 'quiz_id') {
                        $a = $u;
                        $out .= '<tr>';
                        $out .= '<td>Id Quiz</td>';
                        $out .= '<td>' . $a . '</td>';
                        $out .= '</tr>';
                    } else {
                        $a = $u ? "<p style='color: green'>poprawnie</p>" : "<p style='color: red'>Błednie</p>";
                        $out .= '<tr>';
                        $out .= '<td>' . $qs[$cnt - 1]["question"] . '</td>';
                        $out .= '<td>' . $a . '</td>';
                        $out .= '</tr>';
                    }

                    $cnt++;
                }
                $out .= '</table>';
                echo $out;
                
            }
        }
    }
}


//  add quizzer role

function add_quizzer_role () {
        add_role( 'quizzer', 'Quizzer',
            [
                'read' => true,
                'edit_posts' => true,
                'edit_others_posts' => false,
                'edit_published_posts' => true,
                'delete_published_posts' => true,
                'delete_posts' => true,
                'delete_others_posts' => false,
                'publish_posts' => true,
                'upload_files' => true,
                'manage_categories' => true
            ]
        );
    }

//add_action( 'init', 'add_quizzer_role' );

//remove_role('quizzer');




