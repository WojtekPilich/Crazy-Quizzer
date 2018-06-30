<?php
//code for user who are logged in
if ( is_user_logged_in() ) {
//      creating table quiz_users
create_user_db();
// grab current user ID
$user_id = get_current_user_id();
// insert user score into database
insert_user_score($user_id, $data);
// display user results from database
$results = display_user_scores($user_id);

echo '<div class="history-content">';
    // displaying history of current user scores in single-quiz template
    foreach ($results as $res) {
    $uns = maybe_unserialize($res->cor_ans);

    $out = '';
    $out .= '<table class="history-table">';
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
            $out .= '<td>Quiz ID</td>';
            $out .= '<td>' . $a . '</td>';
            $out .= '</tr>';
        } else {
        $a = $u ? "<p style='color: green; font-weight: bold'>poprawnie</p>" : "<p style='color: red; font-weight: bold'>błędnie</p>";
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
    echo '</div>';
}