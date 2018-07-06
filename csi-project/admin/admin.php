<head>
    <title>CSI Admin</title>
</head>
<?php
    include('../layout/header.php');
    //echo $_SESSION['admin_id'];
    if(isset($_SESSION['admin_id'])) {
        echo '<div class="container mt-4 text-center">
        <h2>CSI Admin</h2>
        <p>A panel for CSI members</p>
        <a href="./create_a_post.php"><button class="btn btn-dark">Create a post</button></a><br>
        <a href="./view_posts.php"><button class="btn btn-dark">View Posts</button></a><br>
        <a href="./create_a_problem.php"><button class="btn btn-dark">Create a problem</button></a><br>
        <a href="./view_problems.php"><button class="btn btn-dark">View Problems</button></a><br>
        <a href="../scripts/logout.php"><button class="btn btn-default">Logout</button></a><br>
        <a href="../scripts/students.php"><button class="btn btn-default">Students score</button></a><br>
    </div>';
    } else {
        header('Location: ./');
    }
?>

<?php include('../layout/footer.php') ?>