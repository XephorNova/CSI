<?php
    require '../configuration/database.php';

    $post_id = $_GET['id'];
    
    $query = "SELECT * FROM `blog_table` WHERE `id`='" . $post_id . "'";
    $result = mysqli_fetch_array(mysqli_query($connec, $query));
?>

<head>
    <title>Post</title>
</head>
<?php include('../layout/header.php') ?>

    <div class="container mt-4">
        <div class="wrap-post">
            <h3 class="title"><?php echo $result['blog_title']; ?></h3>
            <p class="small lead"><?php echo $result['blog_post_date'] ?></p>
            <p><?php echo $result['blog_content'] ?></p>
            <br>
            <p class="title"><?php echo $result['blog_post_author'] ?></p>
        </div>
    </div>
