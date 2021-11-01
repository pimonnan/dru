<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Edit Position</title>
</head>
<body>
    <?PHP
        include('connect_db.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_position WHERE position_id = $id";
        $query = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($query);
    ?>

    <div class="container  p-3 mb-2 bg-primary text-back mt-5">

    <!-- <?PHP include('nav.php')?> -->

        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">แก้ไข แบบฟอร์มข้อมูลตำแหน่ง</h1>
                <form action="edit_position.php" method="POST">
                <div class="form-group">
                        <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" value="<?PHP echo $row['position_id'];?>" aria-describedby="emailHelp" placeholder="Enter Name" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="fullname" value="<?PHP echo $row['position_name'];?>" aria-describedby="emailHelp" placeholder="Enter Name" required>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="0" <?php if($row['position_statusid'] == 0) { echo 'selected';} ?>>ไม่ใช้งาน</option>
                            <option value="1" <?php if($row['position_statusid'] == 1) { echo 'selected';} ?>>ใช้งาน</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Created by</label>
                      <input type="text" name="createdby" class="form-control" id="createdby" value="<?PHP echo $row['position_createdby'];?>" placeholder="Enter Createdby" required>
                    </div> -->
                    <div class="col-lg-12 text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="position.php" class="btn btn-secondary">Return</a>
                  </form>
            </div>

        </div>
    </div>
</body>
<!-- <script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    } -->
</script>
</html>