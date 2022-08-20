<?php
include_once 'db.php';
extract($_REQUEST);
$date = date('Y-m-d H:i:s');


    $sql = "INSERT INTO user_details (user_id,book_id,isbn_no,date_of_request,status)
     VALUES ('$uid','$bid','$isbn_id','$date','Pending')";
   // exit;
   // $sql = "SELECT * FROM user  WHERE username = '$username' AND password = '$password' AND active = 1";

     if (mysqli_query($conn,$sql)) {
        //echo "New record has been added successfully !";
        echo "New record has been added succesfully!<script>window.location.replace('booklist.php')</script>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

?>