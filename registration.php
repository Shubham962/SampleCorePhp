<?php
include("config/config.php");
// echo "<pre>";
// print_r($_POST);
// die;
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];
$address = $_POST['address'];
if (!empty($user_name)) {
    $sql_reg = "SELECT * FROM `users` WHERE `user_name`='$user_name'";
	$resnum = mysqli_query($con, $sql_reg);
	$res = mysqli_num_rows($resnum);
	if ($res == 0) {
        $sql2 = "INSERT INTO `users`(`user_name`,`password`,`phone`,`adress`) 
        VALUES ('$user_name','$password','$phone','$address')";
		$resnum2 = mysqli_query($con, $sql2);
		$iid = $con->insert_id;

        $sql = "SELECT * FROM `users` WHERE `id` = '$iid'";
        $result1 = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result1);
        $res = mysqli_fetch_assoc($result1);
        $result = array(
            "response" => array(
					'code' => '201',
					'message' => "Registration  successfully",
					'data' => $res
				)
			);
			print_r(json_encode($result));

    }else{
        $result = array(
            "response" => array(
                'code' => '200',
                'message' => "Plaese Choose oanother user name"
            )
        );
        print_r(json_encode($result)); 
    }
} else {
	$result = array(
		"response" => array(
			'code' => '200',
			'message' => "Plaese enter user name"
		)
	);
	print_r(json_encode($result));
}
