<head>
    <title>Blog - CSI</title>
</head>
<?php include('../layout/header.php') ?>

<div class="container mt-4">
    <h2 class="text-align">Suggest</h2>
    <form id="suggest_form">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="suggest">Suggest:</label>
            <textarea name="content" id="editor" class="form-control"></textarea>
        </div>
        <input type="submit" value="Suggest" name="suggest-form" class="btn btn-success" id="suggest_submit">
    </form>
</div>

<?php include('../layout/footer.php') ?>