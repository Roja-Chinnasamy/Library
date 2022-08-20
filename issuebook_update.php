<?php
include_once 'db.php';
extract($_POST);
$issuedate = date('Y-m-d H:i:s');
//echo "<br> day".$rday;
$returndate = date('Y-m-d H:i:s', strtotime($issuedate. '+'.$rday.' day'));

//echo "<br>".$returndate1 = date('Y-m-d h:i:s', strtotime($issuedate. '+7 day'));


     $sql = "UPDATE user_details SET status='Issued',issued_date='$issuedate',return_date='$returndate' WHERE user_id='$u_id' AND book_id='$b_id' AND isbn_no='$isbn_id'"; 

   // $sql = "SELECT * FROM user  WHERE username = '$username' AND password = '$password' AND active = 1";

     if (mysqli_query($conn,$sql)) {
        echo ("<script LANGUAGE='JavaScript'>
                                window. alert('Book Issued Successfully!');
                                window. location. href='student_request.php';
                                </script>");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

?>