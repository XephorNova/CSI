<?php include('../layout/header.php')?>
     

     <?php require('../scripts/submitanswer.php');/* 
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
        $check= "SELECT * FROM student_id WHERE `emailid`='$id'";
        $checkquery=mysqli_query($connec,$check);
    
    
    $quesid="SELECT * FROM `problem_of_the_week_admin` ORDER BY `id` DESC LIMIT 1";
    $q=mysqli_query($connec,$quesid);
    $idarray=mysqli_fetch_assoc($q);
    $questionno=$idarray['id'];
   // echo $questionno;
    $st="SELECT `idques` FROM `student_id` WHERE `emailid`='$id'";
    $stquery=mysqli_query($connec,$st);
    $starray=mysqli_fetch_assoc($stquery);
    $stno=$starray['idques'];
    
    
    
    
        if(mysqli_num_rows($checkquery)!== 0 && $select_option == $answer['correct_option'] && $name == null && $phno == null && $questionno !== $stno )
        {
         $increasescore="UPDATE `student_id` SET `score`=score+5 WHERE `emailid`='$id'";
            $increase=mysqli_query($connec,$increasescore);
           // if($increase){
           // echo "answer submitted thank you for attempting";
          //      header('studproblems.php');
          //  }
             $insid="UPDATE `student_id` SET `idques`='$questionno' WHERE `emailid`='$id'";
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
           $insertnew="INSERT INTO `student_id`(`name`,`emailid`,`phoneNumber`) VALUES('$name','$id','$phno') ";
            $insquery=mysqli_query($connec,$insertnew);
            
            if($insquery && $select_option == $answer['correct_option']){
            
                $increasescore="UPDATE `student_id` SET `score`=score+5 WHERE `emailid`='$id'";
                $insid="UPDATE `student_id` SET `idques`='$questionno' WHERE `emailid`='$id'";
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

//include('../layout/footer.php'); */

?>
      
<meta http-equiv="Cache-control" content="no-cache">

<div class="container mt-4 ml-auto mr-auto">
   <?php require('../configuration/database.php');
    
    $query="SELECT * FROM `problem_of_the_week_admin` ORDER BY `id` DESC LIMIT 1";
    $questions= mysqli_query($connec,$query);
    

    while($row=mysqli_fetch_assoc($questions)){
    
    
    ?>
   
   <h1 class="text-center lead">Welcome to CSI QUIZ</h1>
      
      
          <div class="card m-auto mb-3">
          <form action="studproblems.php" method="post">

       
       <!--<div class="card-body"><h4 class="card-title"><?php echo $row['problem']?></h4>
   <div class="radio"><input type="radio" name="option1" value="<?php echo $row['option_1']?>"><label><?php echo $row['option_1']; ?></label></div>
   <div class="radio"><input type="radio" name="option2" value="<?php echo $row['option_2']?>"><label><?php echo $row['option_2']; ?></label></div>
   <div class="radio"><input type="radio" name="option3" value="<?php echo $row['option_3']?>"><label><?php echo $row['option_3']?></label></div>
   <div class="radio"><input type="radio" name="option4" value="<?php echo $row['option_4']?>"><label><?php echo $row['option_4']?></label></div>
       </div>-->
       
       
       <div class="card-body"><h4 class="card-title"><?php echo $row['problem']; ?></h4> <br>
          <ol type="1">
          <li><?php echo $row['option_1']; ?></li><hr>
  <li><?php echo $row['option_2']; ?></li><hr>
           <li><?php echo $row['option_3']; ?></li><hr>
           <li><?php echo $row['option_4']; ?></li><hr>
<div class="row">
            <div class="col-xs-6">
            <div class="form-group mx-sm-3 mb-2">           
             
             <input type="text" class="form-control" name="email" placeholder="Enter your Email id" required autocomplete="off" />
             </div>  
             </div><br>
              <div class="col-xs-6">             
             <div class="form-group mx-sm-3 mb-2">
             <input type="text" class="form-control" name="name" placeholder="Enter your Full name" autocomplete="off" />
             </div>
             </div><br>
              <div class="col-xs-6">             
             <div class="form-group mx-sm-3 mb-2">
             <input type="text" class="form-control" name="phonenumber" placeholder="Enter your Contact number" autocomplete="off" />
             </div>
             </div> <br>
             <div class="col-xs-6">
                          <div class="form-group mx-sm-3 mb-2">             
             <label for="options">Select option</label><br>
    <select class="form-control" name="option" required>
      <option value="0">Select option</option>
      <option value="<?php echo $row['option_1']; ?>"><?php echo $row['option_1']; ?></option>
      <option value="<?php echo $row['option_2']; ?>"><?php echo $row['option_2']; ?></option>
      <option value="<?php echo $row['option_3']; ?>"><?php echo $row['option_3']; ?></option>
      <option value="<?php echo $row['option_4']; ?>"><?php echo $row['option_4']; ?></option>
    </select><br>
                 </div>
              </div>
              <div class="col-xs-6">
              <div class="form-group mx-sm-3 mb-2">
              <input type="submit" class="btn btn-success mb-2" name="Submit" />
                  </div>
    </div>
              </div>
       
       
        </ol>
    </div><br>
    
    <?php
    
    }
    ?>
    
    
    </form>
    
</div>

<?php include('../layout/footer.php') ?>
