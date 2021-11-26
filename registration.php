<?php
include("config/config.php");
// echo "<pre>";
//  print_r($_POST);
//  die;
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];
$address = $_POST['address'];
if (!empty($user_name)) {
    $sql_registation="SELECT * FORM `users` WHERE `user_name`='$user_name'";
    $resnum = mysqli_query($con, $sql_registation);
    $res = mysqli_num_rows($resnum);
    if($res == 0){
        $sql1 = "INSERT INTO `users`(`user_name`,`password`,`phone`,`adress`)
        VALUES ('$user_name','$password','$phone','$address')";  
        $resnum1 = mysqli_query($con, $sql1 );
        $lastid = $con->insert_id;

        $sql = "SELECT * FROM `users` WHERE `id ` = '$lastid'";
        $result1 = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result1);
        $res = mysqli_fetch_assoc($result1);
        $result = array(
            "response" => array(
                'code' => '201',
                'message' => "Registration successfully",
                'data' => $res
            )
        );
        print_r(json_encode($result));
    }
    else
    {
        $result = array(
            "response" => array(
                'code' => '200',
                'message' => "user already exist please choose another!"
            )
            );
            print_r(json_encode($result));
    }
}
else
{
    $result = array(
        "response" => array(
            'code' => '200',
            'message' => "Please enter user name "
        )
        );
        print_r(json_encode($result));
}

?>
