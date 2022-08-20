<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- <h2> Admin Log In</h2> -->
    <div class="container form-signin">
        <?php
        error_reporting(0);
        include_once 'db.php';
        session_start();  

                if(isset($_POST['submit']))
                {    
                    extract($_POST);
                    //$username = $_POST['username'];
                    //$password = $_POST['password'];

                    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND active = 1";

                    $result = $conn->query($sql);
                    $id = NULL;
                        foreach($result as $data){
                            $id = $data['id'];
                            $type = $data['type'];
                            }
                            $_SESSION['id'] = $id;
                            $_SESSION['type'] = $type;
                            $_SESSION['username'] = $username;

                        if ($result->num_rows == 1) {
                    
                            echo ("<script LANGUAGE='JavaScript'>
                                window. alert('You have entered valid username and password !');
                                window. location. href='dashboard.php';
                                </script>");
                        } else {
                            echo ("<script LANGUAGE='JavaScript'>
                                window. alert('Wrong username or password ...');
                                </script>");
                        }
                    }

        ?>
    </div>
<div class="container mt-3">
    <h3>Admin Details</h3>
  <!-- <p>Try to submit the form.</p> -->
 
    <!-- <form action="" class="was-validated"> -->
    <div class="mb-3 mt-3"> 
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></form>  

    <form class="was-validated"  method="POST" enctype="multipart/form-data"> 
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>
        <button type="submit" class="btn btn-primary"  name="submit" value="submit">Submit</button>
    </form>
    
</div>
    <div class="container mt-3">
        <p>You have no account please register here...!</p>
        <a href="register.php"><button type="submit" class="btn btn-primary"  name="submit" value="submit">Registration</button></a>
    </div>
</body>
</html>



