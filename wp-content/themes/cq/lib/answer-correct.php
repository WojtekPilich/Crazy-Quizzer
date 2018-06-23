<?php
//function checking if answer is the same as correct field
function checkAnswer($correct, $answer) {
//    $correct = get_sub_field('correct', $id);
    if($answer === $correct) {
        echo 'zaznaczono prawidłową odpowiedź';
        return true;
    }
    echo 'zaznaczono nieprawidłową odpowiedź';
    return false;
}