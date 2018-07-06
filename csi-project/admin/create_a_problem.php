<?php include('../scripts/createProblem.php') ?>
  

  <html>
   <head>
    <title>Create a problem - CSI Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
   <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
</head>
<body>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">Create a problem</h3>
    <p class="text-center lead">A problem, every week.</p>

    <form class="form-control" method="post">
    <div class="form-group">
        <label for="problem">Problem: </label>
        <textarea name="problem" class="form-control" id="summernote"></textarea>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" name="option1" class="form-control" placeholder="Option 1">
        </div>
        <div class="col">
            <input type="text" name="option2" class="form-control" placeholder="Option 2">
        </div>
        <div class="col">
            <input type="text" name="option3" class="form-control" placeholder="Option 3">
        </div>
        <div class="col">
            <input type="text" name="option4" class="form-control" placeholder="Option 4">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="correct_option">Correct answer: </label>
        <input type="text" name="correct_option" class="form-control" placeholder="Correct Answer" required>
    </div>
   <input type="text" name="current_date" id="currentDate" class="form-control" disabled value="<?php 
    date_default_timezone_set("Asia/Kolkata");
    echo date("h:i:sa");
    echo "  ";
    echo date("M j, Y"); ?>"><br>
    <input type="submit" name="to_db" value="Create" class="btn btn-success" href="admin.php">
</form>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote({
           tabsize: 2,
    height: 200,
           placeholder:'Write the Question here',
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
});
    });
  </script>

<!--<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<!--<script src="../assets/main.js"></script>-->
</body>
</html>