<?php
    require '../configuration/database.php';
if(isset($_POST['to_db'])){

    $problem = ($_POST['problem']);
    $option_1 = htmlspecialchars($_POST['option1']);
    $option_2 = htmlspecialchars($_POST['option2']);
    $option_3 = htmlspecialchars($_POST['option3']);
    $option_4 = htmlspecialchars($_POST['option4']);
    $correct = htmlspecialchars($_POST['correct_option']);

    echo(json_encode(array("problem" => $problem, "opt1" => $option_1, "opt2" => $option_2, "opt3" => $option_3, "opt4" => $option_4, "correct" => $correct)));

    $query = "INSERT INTO
  problem_of_the_week_admin (
    problem,
    option_1,
    option_2,
    option_3,
    option_4,
    correct_option
  )
VALUES
  (
    '$problem',
    '$option_1',
    '$option_2',
    '$option_3',
    '$option_4',
    '$correct'
  )";

    if(!mysqli_query($connec, $query)) {
        echo(json_encode(array('status' => 'OK', 'message' => 'Problem could not be created.', 'error' => mysqli_error($connec))));
    } else {
        echo(json_encode(array('status' => 'OK', 'message' => 'Problem created successfully.')));
    }
    
    mysqli_close($connec);

}
?>