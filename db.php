<?php
session_start();
$severname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'library';
$conn = mysqli_connect($severname, $username, $password, $dbname);
if (!$conn) {
  die("error to connect:" . mysqli_error());
} 


$id = $_SESSION['id'];
$type = $_SESSION['type'];
$username = $_SESSION['username'];
?>
