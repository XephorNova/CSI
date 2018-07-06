<?php 
    require '../configuration/database.php';

    $message = ''; $class = ''; $visibility = 'none';
    if(isset($_GET['id'])) {
        $post_id = $_GET['id'];

        $query = "DELETE FROM blog_table WHERE id= '$post_id'";
        if(!mysqli_query($connec, $query)) {
            $message = "Post could not be deleted";
            echo "<script>alert('$message');</script>";
        } else {
            $message = "Post deleted successfully";
            echo "<script>alert('$message');</script>";
        }
    }
?>

<head>
    <title>View posts - CSI Admin</title>
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">All Posts</h3>
    <p class="text-center lead">Below are the posts created.</p>
    <div class="wrap-blog"></div>
</div>

<?php include('../layout/footer.php') ?>