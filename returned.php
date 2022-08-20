<?php
include_once 'db.php';
extract($_REQUEST);
$returned_date = date('Y-m-d H:i:s');

echo $sql = "UPDATE user_details SET status='Returned',returned_date='$returned_date' WHERE user_id='$uid' AND book_id='$bookid' AND isbn_no='$isbid'";  

// $sql = "SELECT * FROM user  WHERE username = '$username' AND password = '$password' AND active = 1";

    if (mysqli_query($conn,$sql)) {
    echo ("<script LANGUAGE='JavaScript'>
                            window. alert('Book Returned Successfully!');
                            window. location. href='request_book.php';
                            </script>");
    } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);

?>