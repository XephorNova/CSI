    <?php 
//include('../layout/header.php');
require('../configuration/database.php');
$id="";
$name="";
$phno="";
 
if(isset($_POST['Submit']))
{
$select_option=$_POST['option'];
$id = mysqli_real_escape_string($connec,$_POST["email"]);
if (!filter_var($id, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
    echo'<script>alert("Invalid email format")</script>';
}
$name=htmlspecialchars($_POST['name']);
$phno=htmlspecialchars($_POST['phonenumber']);
$c="SELECT `correct_option` FROM `problem_of_the_week_admin` ORDER BY `id` DESC LIMIT 1";
$getans=mysqli_query($connec,$c);
$answer=mysqli_fetch_assoc($getans);
   // echo $answer['correct_option'];
        $check= "SELECT * FROM `problem_of_the_week` WHERE `email_student`='$id'";
        $checkquery=mysqli_query($connec,$check);
    
    
    $quesid="SELECT * FROM `problem_of_the_week_admin` ORDER BY `id` DESC LIMIT 1";
    $q=mysqli_query($connec,$quesid);
    $idarray=mysqli_fetch_assoc($q);
    $questionno=$idarray['id'];
   // echo $questionno;
    $st="SELECT `idques` FROM `problem_of_the_week` WHERE `email_student`='$id'";
    $stquery=mysqli_query($connec,$st);
    $starray=mysqli_fetch_assoc($stquery);
    $stno=$starray['idques'];
    
    
    
    
        if(mysqli_num_rows($checkquery)!== 0 && $select_option == $answer['correct_option'] && $name == null && $phno == null && $questionno !== $stno )
        {
         $increasescore="UPDATE `problem_of_the_week` SET `score`=score+5 WHERE `email_student`='$id'";
            $increase=mysqli_query($connec,$increasescore);
           // if($increase){
           // echo "answer submitted thank you for attempting";
          //      header('studproblems.php');
          //  }
             $insid="UPDATE `problem_of_the_week` SET `idques`='$questionno' WHERE `email_student`='$id'";
                $insquery=mysqli_query($connec,$insid);
        header('Location: ../studindex.php');
        }
        else{
            
           //echo "<script>window.alert('you are new user please enter all the details')</script>";
          echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>NOTE :</strong> If your are new user please enter all field below !!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            if(!empty($name) && !empty($phno)){
           $insertnew="INSERT INTO `problem_of_the_week`(`name_of_student`,`email_student`,`phone_number`) VALUES('$name','$id','$phno') ";
            $insquery=mysqli_query($connec,$insertnew);
            
            if($insquery && $select_option == $answer['correct_option']){
            
                $increasescore="UPDATE `problem_of_the_week` SET `score`=score+5 WHERE `email_student`='$id'";
                $insid="UPDATE `problem_of_the_week` SET `idques`='$questionno' WHERE `email_student`='$id'";
                $insquery=mysqli_query($connec,$insid);
            $increase=mysqli_query($connec,$increasescore); 
                header('Location: ../studindex.php');
            }
            }
        
  
        }
   


//header('Location: ../studindex.php');
}

clearstatcache();
 mysqli_close($connec);
//header('../pages/studproblems.php')

//include('../layout/footer.php');

?>