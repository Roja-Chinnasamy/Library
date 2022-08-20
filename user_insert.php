<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $Username = $_POST['username'];
     $Password = $_POST['password'];
     
     $sql = "INSERT INTO user (username,password)
     VALUES ('$Username','$Password')";
     
     if (mysqli_query($conn, $sql)) {
        //echo "New record has been added successfully !";
        echo "New record has been added succesfully!<script>window.location.replace('admin.php')</script>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
