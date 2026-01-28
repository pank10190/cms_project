<?php
session_start();
include('../dbconfig.php');

$uname = $_POST['uname'];
$pass = $_POST['pass'];

 $sql = "SELECT * FROM `admins` WHERE `username`='$uname' && `password`='$pass' "; //WHERE status='1'
$result = $conn_douwantm->query($sql);
 $ff=$result->num_rows;
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$_SESSION['admin_id'] = $row['id'];
	$_SESSION['admin_username'] = $row['username'];
	echo "success";
} else {
	echo "fail";
}
?>