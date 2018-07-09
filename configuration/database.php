<?php 

    $DB_HOST = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASS = 'root';

    //Create a connection
    $connec = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASS);

    //Check the connection
    if(!$connec) {
        echo 'Did not connect to the server due to some error' . mysqli_connect_errorno();
    }

    //Check if database exist
    if(!mysqli_select_db($connec, 'blog')) {
        echo 'Could not find the database you are looking for';
    }

?>