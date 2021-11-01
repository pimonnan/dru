<?php
    include('connect_db.php');

    // print_r($_POST);
    // exit;
    $name = $_POST['name'];
    $username = $_POST['username'];
    $position = $_POST['position'];
    $photo = $_POST['photo'];
    $id = $_POST['userid'];

    $sql = "UPDATE tbl_user SET user_name = '$name', 
                user_username = '$username', 
                user_position = '$position', 
                user_photo = '$photo'
                WHERE user_id = '$id'";
           
    
    // บันทึก
    $query = mysqli_query($connection, $sql);

    // ลิ้งค์กลับ
    Header("location:users.php");

?>