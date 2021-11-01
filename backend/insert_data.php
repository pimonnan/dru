<?php
    include('connect_db.php');

    // print_r($_POST);
    // exit;
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    $photo = $_POST['photo'];

    $sql = "INSERT INTO tbl_user(user_name, user_username, user_password, user_position, user_photo)
            VALUES('$name', '$username', '$password', '$position', '$photo')";
    
    // บันทึก
    $query = mysqli_query($connection, $sql);

    // ลิ้งค์กลับ
    // Header("location:users.php");
    echo 'Insert data successfully';

?>