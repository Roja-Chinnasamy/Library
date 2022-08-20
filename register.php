<!Doctype html>
<html lang="en">
  <head>
        <title> Validate the Password </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
         <!-- <style>
            body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: lightblue;
        }
        h2 {
            text-align: center;
            color: #017572;
        }
         </style> -->
        

<?php
include_once 'db.php';

if(isset($_POST['submit']))
{    
     $username = $_POST['username'];
     $password = $_POST['password'];
     $type = $_POST['type'];
     $date = date('Y-m-d H:i:s');

      $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
     
     $result = $conn->query($sql);

  if ($result->num_rows == 0) {

    $sql = "INSERT INTO user (username,password,type,registration) VALUES ('$username','$password','$type','$date')";

        if (mysqli_query($conn, $sql)) {
            echo ("<script LANGUAGE='JavaScript'>
        window. alert('New record has been added successfully !');
        window. location. href='index.php';
        </script>");
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
} else {
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Already exist your username and password !');
        window. location. href='index.php';
        </script>");
        }
        mysqli_close($conn);
}
?> 
</head>
  <body>
      <h1 style="color:green">User Login Page</h1>
       <form action="register.php" class="was-validated"  method="post" onsubmit ="return validateForm()">   
        <div class="mb-3 mt-3"> 
      <!-- <h3> Verify valid password Example </h3> -->
      

      

      <!-- Enter first name -->
      <label for="username" class="form-label">User Name:</label>
      <!-- <td> Username: </td> -->
      <input type = "text" id = "username"  name="username" value = ""> 
      <span id = "blankMsg" style="color:red"> </span> <br><br>

      <!-- Create a new password -->
      <label for="password" class="form-label">Password:</label>
      <!-- <td> Password:</td> -->
      <input type = "password" id = "pswd1"  name="password" value = ""> 
      <span id = "message1" style="color:red"> </span> <br><br>

      <!?Enter confirm password -->
      <label for="password" class="form-label">Confirm Password:</label>
      <!-- <td> Confirm Password: </td> -->
      <input type = "password" id = "pswd2"  name="password" value = ""> 
      <span id = "message2" style="color:red"> </span> <br><br>

      <label for="type" class="form-label">Type:</label>
      <!-- <td> Type: </td> -->
      <input type="radio" id="type" name="type" value="Admin">
      <label for="Admin">Admin</label>
      <input type="radio" id="type" name="type" value="User">
      <label for="User">User</label><br><br>

      <!-- Click to verify valid password -->
      <!-- <button type ="submit" class="btn btn-primary" name="submit"  value ="submit">Submit</button> -->
      <button type="submit" class="btn btn-primary"  name="submit" value="submit">Register</button>
        </div>
      
      </form><br>
      <a href="index.php"><button type ="submit" class="btn btn-primary" name="submit"  value ="submit">Back to Login</button></a>

  </body>
</html>

<!-- <script type="text/javascript">
    function validate() {


        with(document.myForm) {
            if (username.value.match(/\ /)) {
                alert("Please Select a Username without Spaces");
                username.focus();
                username.value = "";
                return false
            }
        }

        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
      }
</script> -->

<script>
          function validateForm() {
              //collect form data in JavaScript variables
              var pw1 = document.getElementById("pswd1").value;
              var pw2 = document.getElementById("pswd2").value;
              var name1 = document.getElementById("username").value;
          // var name2 = document.getElementById("lname").value;
            
            //check empty first name field
            if(name1 == "") {
              document.getElementById("blankMsg").innerHTML = "**Fill the first name";
              return false;
            }
            
            //check empty password field
            if(pw1 == "") {
              document.getElementById("message1").innerHTML = "**Fill the password please!";
              return false;
            }
          
            //check empty confirm password field
            if(pw2 == "") {
              document.getElementById("message2").innerHTML = "**Enter the password please!";
              return false;
            } 
          
            //minimum password length validation
            if(pw1.length < 6) {
              document.getElementById("message1").innerHTML = "**Password length must be atleast 6 characters";
              return false;
            }

            //maximum length of password validation
            if(pw1.length > 15) {
              document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";
              return false;
            }
          
            if(pw1 != pw2) {
              document.getElementById("message2").innerHTML = "**Passwords are not same";
              return false;
            } else {
              alert ("Your account created successfully"); 
              // document.write("The form submitted successfully");
            }
        }
        </script>


  
