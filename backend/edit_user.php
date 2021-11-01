<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login System</title>
</head>
<body>
    <?PHP 
        include('connect_db.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_user WHERE user_id = $id";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($query);
    ?>
      <div class="container p-3 mb-2 bg-primary text-back mt-5">
        <!-- <?php include('nav.php')?> -->
        <div class="row">
          <div class="col-md-12 mt-4">
            <h2 class="text-center">แก้ไขแบบฟอร์มการลงทะเบียน</h2>
            <form action = "update_data.php" method = "POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name = "name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value = "<?PHP echo $row['user_name']?>" placeholder="Enter name" required>
                    <input type="hidden" name = "userid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value = "<?PHP echo $row['user_id']?>" placeholder="Enter name" required>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name = "username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value = "<?PHP echo $row['user_username']?>" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                    <select name="position" id="position" class="form-control" required>
                        <?PHP
                          $sql2 = "SELECT * FROM tbl_position ORDER by 'position_id' DESC";
                          $query2 = mysqli_query($connection,$sql2);
                          while ($row2 = mysqli_fetch_array($query2)){?>
                          <option value="<?php echo $row2 ['position_id'];?>" <?php if ($row2 ['position_id'] == $row ['user_position']){ echo 'selected'; }?>><?php echo $row2 ['position_name'];?></option>
                          <?PHP } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Photo Link</label>
                    <input type="text" name = "photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value = "<?PHP echo $row['user_photo']?>" placeholder="Enter Photo" required>
                </div>
                <div class="col-lg-12 text-center" style="margin-top: 20px;">
                <button type="submit" class="btn btn-warning ">Update</button>
                <a href="users.php" class="btn btn-secondary">Return</a>
              </form>
          </div>
        </div>
      </div>
</body>
</html>