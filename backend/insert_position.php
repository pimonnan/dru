<?PHP
    session_start();

    include('connect_db.php');

    //print_r($_POST);
    $name = $_POST['name'];
    $status = $_POST['status'];
    $createdby = $_SESSION['Mlogin'];
    $date = date('Y-m-d h:i:s');

    $sql = "INSERT INTO tbl_position (position_name,position_statusid,position_createdby,position_createdate)
    VALUES ('$name', '$status', '$createdby', '$date')";
 
   $query = mysqli_query($connection,$sql);

    echo 'Insert data successful';
     Header('Location:position.php');
    
?>