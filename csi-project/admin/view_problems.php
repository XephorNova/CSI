<?php include('../layout/header.php')?>

<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">All Question</h3>
    <p class="text-center lead">Below are the Questions created.</p>
    <div class="wrap-blog"></div>
</div>


<?php 
 include('../configuration/database.php');
$one="option_1";
$two="option_2";
$three="option_3";
$four="option_4";
$answer="correct_option";

$getProblems = "SELECT * FROM 
`problem_of_the_week_admin`";

$result= mysqli_query($connec,$getProblems);
if($result)

 //Fetch one and one row from database
    while($row=mysqli_fetch_assoc($result))
    {   
        echo '<div class="container mt-4 ml-auto mr-auto">';
        echo '<form method="get" action="view_problems.php" >';
        echo '<div class="form-group">';
        echo '<label for="problem">Problem: </label>';
        echo '<p><textarea name="problem" class="form-control" disabled>';
        echo "$row[problem]";
        echo '</textarea></p>';
        echo '</div>';
        echo "<ul>";
        echo "option-1: "."<li>".$row[$one]."</li>";
        echo "Option-2: "."<li>".$row[$two]."</li>";
        echo "Option-3: "."<li>".$row[$three]."</li>" ;
        echo "Option-4: "."<li>".$row[$four]."</li>";
        echo '<div class "text-success>';
        echo "Correctoption: "."<li>".$row[$answer]."</li>";
        echo '</div>';
        echo "</ul>";
        echo "</form>";
        echo "</div>";
               
    
   // print_r($array);
    }
    mysqli_free_result($result);








?>
<?php include('../layout/footer.php') ?>
