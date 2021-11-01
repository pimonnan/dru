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
    <link rel="stylesheet" href="css/datatable.bootstrap4.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Position</title>
</head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">

    <?PHP include('nav.php')
    ?>

        <div class="row">
            <div class="col-md-12 mt-3">
                <h1 class="text-center">การจัดการตำแหน่ง</h1>
                <center><img src="position-removebg-preview.png" alt="position-removebg-preview" width="150" height="150"></center>
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter"  class="btn btn-primary my-3">เพิ่มข้อมูล</a>

                <table class="table  table-sm" id="table1">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Position</th>
                    <th scope="col">Status</th>
                    <th scope="col">Createdby</th>
                    <th scope="col">Createdate</th>
                    <th scope="col">Updateby</th>
                    <th scope="col">Updatedate</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                    <?PHP
                    include('connect_db.php');
                    $i = 1;
                    $sql = "SELECT * FROM tbl_position, tb_admin WHERE admin_id = position_createdby order by 'position_id' DESC";
                    $query = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <th scope="row"><?PHP echo $i++;?></th>
                    <td><?PHP echo $row['position_name'];?></td>
                    <td><?PHP if($row['position_statusid'] == 0)
                    {
                      echo 'ไม่ใช้งาน';
                    }else{
                      echo 'ใช้งาน';
                    }
                    
                    ?></td>
                    <td><?PHP echo $row['admin_name'];?></td>
                    <td><?PHP echo $row['position_createdate'];?></td>
                    <td><?PHP echo $row['position_updatedby'];?></td>
                    <td><?PHP echo $row['position_updatedate'];?></td>
                    <td><a href="form_edit_position.php?id=<?PHP echo $row['position_id'];?>" class="btn btn-outline-warning">แก้ไข</a></td>
                    <td><a href="" onclick="delete_position(<?PHP echo $row['position_id'];?>)" class="btn btn-outline-danger">ลบ</a></td>
                </tr>
                <?PHP }?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูลตำแหน่ง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container p-3 mb-2 bg-primary text-back">
      <form action="insert_position.php" method="POST">
                    <h2 class="text-center">แบบฟอร์มข้อมูลตำแหน่ง</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Enter Name" required >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="0">ไม่ใช้งาน</option>
                            <option value="1">ใช้งาน</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Created by</label>
                      <input type="text" name="createdby" class="form-control" id="createdby" placeholder="Enter Created by" required >
                    </div> -->
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                  </form>
      </div>
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
        $('#insert_position').click(function(e){
          e.preventDefault();
          var name = $('#fullname').val();
          var status = $('#status').val();
          var createdby = $('#createdby').val();

          $.ajax({
            url : "insert_position.php",
            type : "post",
            data : {name : name, status : status, createdby : createdby},
            success : function(data){
              alert(data);
              location.reload();
            }
          });
        });
    } );
    function delete_position(id){
        if(confirm('Are you sure you want to delete this user?')){
        $.get('delete_position.php?id='+id , function(data){
            alert(data);
            location.reload();
        });
        }
    }
    </script>
    <!-- <script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script> -->
</body>
</html>