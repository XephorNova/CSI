
     <?php 
include('../layout/header.php');
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
        $check= "SELECT * FROM student_id WHERE `emailid`='$id'";
        $checkquery=mysqli_query($connec,$check);
        if(mysqli_num_rows($checkquery)!== 0 && $select_option == $answer['correct_option'] && $name == null && $phno == null )
        {
         $increasescore="UPDATE `student_id` SET `score`=score+5 WHERE `emailid`='$id'";
            $increase=mysqli_query($connec,$increasescore);
           // if($increase){
           // echo "answer submitted thank you for attempting";
          //      header('studproblems.php');
          //  }
            
        
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
           $insertnew="INSERT INTO `student_id`(`name`,`emailid`,`phoneNumber`) VALUES('$name','$id','$phno') ";
            $insquery=mysqli_query($connec,$insertnew);
            
            if($insquery){
            
                $increasescore="UPDATE `student_id` SET `score`=score+5 WHERE `emailid`='$id'";
            $increase=mysqli_query($connec,$increasescore); 
            }
            }
        
   // header('../pages/studproblems.php');
        }
   


//header('studproblems.php');
}

clearstatcache();
 mysqli_close($connec);
//header('../pages/studproblems.php')

include('../layout/footer.php');

?>