<?php
session_start();

  
if(!empty($_SESSION['Mlogin'])){
  // header('Location:login.php?error=Please login');
  echo '';
  // header('Location: login.php');
  //ก้อบไปลงหน้าที่จะไม่ให้เข้าเพราะหน้าโปดัทยังเข้าได้
}else{
  // header('Location: login.php');
  header('Location:login.php?error=Please login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/datatable.bootstrap4.css">
    <title>Login System</title>
</head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">
        <?php include('nav.php')?>  
        <div class="row">
            <div class="col-md-12 mt-4 my-3">
                <h2 class="text-center">จัดการผู้ใช้งาน</h2> 
                <center><img src="users-removebg-preview.png" alt="users-removebg-preview" width="150" height="150"></center>
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary my-3">เพิ่มข้อมูล</a>
                <table class="table table-hover mt-3" id = "table1">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Position</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?PHP
                        $i = 1;
                        include('connect_db.php');
                        $sql = "SELECT * FROM tbl_user, tbl_position WHERE position_id = user_position ORDER by 'user_id' DESC";
                        $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                        // $url = $row['user_photo'];
                        // $image = base64_encode(file_get_contents($url));

                    ?>
                        <tr>
                            <th scope="row"><?PHP echo $i++; ?></th>
                            <td><?PHP echo $row['user_name'];?></td>
                            <td><?PHP echo $row['user_username'];?></td>
                            <td><?PHP echo $row['position_name'];?></td>
                            <td><img src = "<?PHP echo $row['user_photo'] ?>" alt = "" width = "60"></td>
                            <td><a href="edit_user.php?id=<?PHP echo $row['user_id'];?>" class="btn btn-outline-warning">แก้ไข</a></td>
                            <td><a href="#" onclick = "delete_user(<?PHP echo $row['user_id'];?>)" class="btn btn-outline-danger">ลบ</a></td>
                        </tr>
                        <?PHP } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูลผู้ใช้งาน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body container p-3 mb-2 bg-primary text-back">
            <h2 class="text-center">แบบฟอร์มการลงทะเบียน</h2>
            <form action = "insert_data.php" id = "insert_data" method = "POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name = "name" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Enter name" required>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name = "username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name = "password" class="form-control" id="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                    <select name="position" id="position" class="form-control" required>
                        <?PHP
                          $sql2 = "SELECT * FROM tbl_position ORDER by 'position_id' DESC";
                          $query2 = mysqli_query($connection,$sql2);
                          while ($row2 = mysqli_fetch_array($query2)){?>
                          <option value="<?php echo $row2 ['position_id'];?>"><?php echo $row2 ['position_name'];?></option>
                          <?PHP } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Photo Link</label>
                    <input type="text" name = "photo" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Photo" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Clear</button>
            </form>
        </div>
    </div>
    </div>
    
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/datatable.js"></script>
        <script src="js/datatable.bootstrap4.js"></script>
        
        <script>
            $(document).ready(function() {
                
                $('#table1').DataTable();
            
                $('#insert_data').submit(function(e) {
                    e.preventDefault();

                    var name = $('#fullname').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var position = $('#position').val();
                    var photo = $('#image').val();

                    $.ajax({
                        url : "insert_data.php",
                        type : "POST",
                        data : {name : name, username : username, password : password, position : position, photo : photo},
                        success : function(data) {
                            alert(data);
                            location.reload();
                        }
                    });
                
                });
            });

            function delete_user(id) {
                if(confirm('Are you sure you want to deiete this user?')) {
                    $.get('delete_user.php?id=' + id, function(data){
                        alert(data);
                        location.reload();
                    });
                }
            }
        </script>
</body>
</html>