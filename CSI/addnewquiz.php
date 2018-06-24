<?php
 
if(isset($_POST['todb']))
{
    $question=$_POST['question'];
    $first=$_POST['first'];
    $second=$_POST['second'];
    $third=$_POST['third'];
    $fourth=$_POST['fourth'];
    $answer=$_POST['answer'];
$connection = mysqli_connect('localhost', 'root' ,'','quiz');
     
    if($connection)
    {
        echo "WE are connected";
        
    }else
    {
        die("database connection failed");
    }
    
    
    $query = "INSERT INTO answers(question,answer1,answer2,answer3,answer4,corranswer) ";
    $query .= "VALUES ('".$question."','".$first."','".$second."','".$third."','".$fourth."','".$answer."')";
        
        $result = mysqli_query($connection, $query);
    if(!$result)
    {
        die('Query FAILED'. mysqli_error());
    }
   
   
}

?>
    <?php include 'includes/header.php';?>

        <div class="container">
            <h1 align="center">
                Enter the QUIZ Question
            </h1>
        </div>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });

        </script>
        <div class="col-xs-6">
            <form action="addnewquiz.php" method="post">
                <label for="input">Enter the Question</label>
                <input type="text" class="summernote" name="question" id="summernote" cols="10" rows="10">
                <label for="input">Enter first option</label>
                <input type="text" class="summernote" name="first" id="summernote" cols="10" rows="10">
                <label for="input">Enter Second option </label>
                <input type="text" class="summernote" name="second" id="summernote" cols="10" rows="10">
                <label for="input">Enter third option</label>
                <input type="text" class="summernote" name="third" id="summernote" cols="10" rows="10">
                <label for="input">Enter fourth option</label>
                <input type="text" class="summernote" name="fourth" id="summernote" cols="10" rows="10">
                <label for="input">Enter correct answer</label>
                <input type="text" class="summernote" name="answer" id="summernote" cols="10" rows="10">
                <input type="submit" class="btn btn-primary" name="todb" value="Post">
            </form>
        </div>
   <?php include 'includes/footer.php';?>