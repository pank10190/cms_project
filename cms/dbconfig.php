<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cms';

$conn_douwantm = new mysqli($host, $user, $pass, $dbname);

if ($conn_douwantm->connect_error) {
    die("Connection failed: " . $conn_douwantm->connect_error);
}
?>
