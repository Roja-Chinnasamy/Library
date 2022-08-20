<?php
session_start();
error_reporting(0);
include_once 'db.php';

if(isset($_POST['submit']))
{    
   extract($_POST);
     
     $sql = "INSERT INTO user_details (status) VALUES ('$status')";
     
     if (mysqli_query($conn, $sql)) {
        //echo "New record has been added successfully !";
        echo "New record has been added succesfully!<script>window.location.replace('view.php')</script>";         
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Dashboard admin</title>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css'>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500" rel="stylesheet"/>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="style.css">

      <?php
      
      ?>
</head>
<body>
      <div class="wrapper">
            <div class="header">
                  <div class="top">
                        <div class="container-fluid">
                              <h1>Welcome to Dashboard - <?=$username;?></h1>
                              <?php if($type == 'Admin') {?>
                                    <a href="booklist.php"><button class="btn btn-primary">Book List</button></a>
                                    <a href=""><button class="btn btn-primary">Student List</button></a>
                                    <a href=""><button class="btn btn-primary">History</button></a><br><br>
                                    <a href="student_request.php"><button class="btn btn-primary">Student Request</button></a>
                                    <a href="index.php"><button class="btn btn-primary">Logout</button></a>
                                    
                                    </div>
                                    <?php  }else{?>
                                    <a href="booklist.php"><button class="btn btn-primary">Book List</button></a>
                                    <a href="request_book.php"><button class="btn btn-primary">Requested Book</button></a>
                                    <a href="index.php"><button class="btn btn-primary">Logout</button></a>
                              <?php  }?>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>