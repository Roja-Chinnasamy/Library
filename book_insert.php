<?php
include_once 'db.php';
if(isset($_POST['submit']))
{   
   extract($_POST); 
   //   $book = $_POST['bname'];
   //   $author = $_POST['aname'];
   //   $year = $_POST['pyear'];
   //   $quantity = $_POST['quantity'];
     
     echo $sql = "INSERT INTO book_details (book_name,author_name,publish_year,number_of_quantity)
     VALUES ('$bname','$aname','$pyear','$quantity')";

     if (mysqli_query($conn, $sql)) {
      echo"<script>alert('New record has been added successfully!')</script>";
      echo"<script>window.location.replace('booklist.php')</script>";
        //echo "New record has been added successfully !";
      //   echo "New record has been added succesfully!<script>window.location.replace('booklist.php')</script>";
     } else {
      //   echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
