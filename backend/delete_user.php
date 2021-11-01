<?PHP
// url mrthon = GET, Form methon = POST
    include('connect_db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_user WHERE user_id = $id";
    $query = mysqli_query($connection, $sql);

    echo "Delete user successfully"
?>