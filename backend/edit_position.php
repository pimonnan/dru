<?PHP
    session_start();
    include('connect_db.php');

    $name = $_POST['name'];
    $status = $_POST['status'];
    $updatedby = $_SESSION['auth-name'];
   
    $date = date('Y-m-d h:i:s');
    $id = $_POST['id'];

    $sql = "UPDATE tbl_position SET position_name = '$name',
    position_statusid = '$status',
    position_updatedby = '$updatedby',
    position_updatedate = '$date'
    WHERE position_id = '$id'";

    $query = mysqli_query($connection,$sql);

    Header('Location:position.php');
?>