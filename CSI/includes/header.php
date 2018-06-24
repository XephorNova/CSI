    <!DOCTYPE html>
    <html lang="en">

    <title>Enter the Question</title>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- include jquery -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
        <!-- include summernote -->
        <link rel="stylesheet" href="dist/summernote.css" />
        <script type="text/javascript" src="dist/summernote.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.summernote').summernote({
                    height: 200
                });
                //        $('form').on('submit', function (e) {
                // e.preventDefault();
                //alert($('.summernote').summernote('code'));
                //alert($('.summernote').val());
                //  });

            });

        </script>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">KJSIEIT-CSI Admin Panel</a>
                </div>
                <div class="topnav">
                    <button class="active"><a href="#">Home</a></button>
                    <button class="active"><a href="#">logout</a></button>
                    <button class="active"><a href="#">Blogs</a></button>
                    <button class="active"><a href="#">Quiz</a></button>
                </div>
            </div>
        </nav>