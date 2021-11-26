<?php
//error_reporting(0);
define('BASE_URL','http://localhost/SampleProject');
$servername="localhost";
$username="root";
$password="";
$dbName="webservice1";
$con=mysqli_connect($servername,$username,$password,$dbName);
mysqli_select_db($con,$dbName);
if($con){
 //echo "Connected";
}else{
    echo "Connection fail".mysql_error($con);
}
?>