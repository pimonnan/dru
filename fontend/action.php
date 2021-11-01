<?php
    include "../backend/connect_db.php";

    $input = json_decode(file_get_contents('php://input'));

    $data = array();
    if($input->action == "getData"){
        
        $sql = "SELECT * FROM tb_member order by member_id desc";
        $query = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    if($input->action == "save"){

        $name = $input->name;
        $email = $input->email;

       echo $sql = "INSERT INTO tb_member (member_name, member_email) VALUES ('$name', '$email')";
        // $query = mysqli_query($connection, $sql);
        // $output = array(
        //     'message' => "Add member successfully",
        // );

        // echo json_encode($output);
    }
?>