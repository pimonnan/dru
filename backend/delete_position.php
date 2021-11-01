<?PHP
    include('connect_db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_position WHERE position_id = $id";
    $query = mysqli_query($connection,$sql);

    Header('Location:position.php');
    echo 'Delete user succcessful';

?>