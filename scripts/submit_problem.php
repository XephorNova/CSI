<?php 
   /* keval require '../configuration/database.php';

    $question_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $option = $_POST['options'];
    $score = 0;

    //echo json_encode(array("id" => $question_id, "name" => $name, "mobile" => $mobile, "option" => $option, "email" => $email));

    $query = "SELECT email_student from problem_of_the_week where email_student='$email'";
    $result = mysqli_query($connec, $query);

    //echo json_encode(array("result" => mysqli_num_rows($result)));   

    if(mysqli_num_rows($result) > 0) {
     keval//   /*$query = "SELECT score from problem_of_the_week where email_student='$email'";
        $result = mysqli_query($connec, $query);
        //echo json_encode(array("result" => mysqli_fetch_all($result, MYSQLI_ASSOC)));

        $score = mysqli_fetch_all($result, MYSQLI_ASSOC);*/
      /*  echo "not new user";
        $correct_option = '';
        $query = "SELECT correct_option from problem_of_the_week_admin where id=$question_id";
        //echo $query;
        $res = mysqli_query($connec, $query);
        //print_r(mysqli_fetch_assoc($res));
        $temp = mysqli_fetch_assoc($res);
        $correct_option = $temp['correct_option'];
        echo "outside new";

        if($option == $correct_option) {
            echo "inside new";
            $query = "UPDATE problem_of_the_week 
            SET score = score + 5 
            WHERE email_student = '$email'";

            if(mysqli_query($connec, $query)) {
                echo "plus 5 new";
            }
        }
        //print_r($correct_option);
       // /*$temp = mysqli_fetch_assoc($res, MYSQLI_ASSOC);
     //   echo json_encode($temp);*/
     //   
     //   //json_encode($score)['score'] = json_encode($score)['score'] + 5; 
 /*keval   } else {
        $query = "INSERT INTO problem_of_the_week (name_of_student, email_student, phone_number, score) VALUES ('$name', '$email', $mobile, $score)";

        if(mysqli_query($connec, $query)) {
            echo "new user";
        }

        $correct_option = '';
        $query = "SELECT correct_option from problem_of_the_week_admin where id=$question_id";
        //echo $query;
        $res = mysqli_query($connec, $query);
        //print_r(mysqli_fetch_assoc($res));
        $temp = mysqli_fetch_assoc($res);
        $correct_option = $temp['correct_option'];
        echo "outside new";

        if($option == $correct_option) {
            echo "inside new";
            $query = "UPDATE problem_of_the_week 
            SET score = score + 5 
            WHERE email_student = '$email'";

            if(mysqli_query($connec, $query)) {
                echo "plus 5 new";
            }
        }
    } */
?>
