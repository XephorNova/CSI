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
        <a href="./create_a_post.php"><button class="btn btn-dark  btn-md center-block">Create a post</button></a>
        <a href="./view_posts.php"><button class="btn btn-dark  btn-md center-block">View Posts</button></a>
        <a href="./create_a_problem.php"><button class="btn btn-dark  btn-md center-block">Create a problem</button></a>
        <a href="./view_problems.php"><button class="btn btn-dark  btn-md center-block">View Problems</button></a>
         <a href="./students.php"><button class="btn btn-dark  btn-md center-block">Students score</button></a>
         <a href="#"><button class="btn btn-dark  btn-md center-block">Seminar notification</button></a>
        <a href="../scripts/logout.php"><button class="btn btn-default  btn-md center-block">Logout</button></a>
    </div>';
    } else {
        header('Location: ./');
    }
?>

<?php include('../layout/footer.php') ?>
