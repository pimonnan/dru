<?php
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "dru_test";

    $connection = mysqli_connect($localhost, $username, $password, $database);
    
    if(!$connection){
        echo '!Error Connect to database';
    }
?>