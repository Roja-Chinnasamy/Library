<?php
error_reporting(1);
include_once 'db.php';

if(isset($_POST['submit']))
{   
  extract($_POST); 
  $sql = "INSERT INTO book_details (book_name,author_name,publish_year,number_of_quantity)
  VALUES ('$bname','$aname','$pyear','$quantity')";

  if (mysqli_query($conn, $sql)) {
    echo"<script>alert('New record has been added successfully!')</script>";
    echo"<script>window.location.replace('booklist.php')</script>";
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
  }
}
?>
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
    <div class="container mt-3">
      <h3>Book Details</h3>
      <span style="margin-left:950px;">
      <a href="booklist.php"><button type="button" class="btn btn-primary">Back</button></a>
      </span> 

      <form class="was-validated" action="book.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">  
        <label for="bname" class="form-label">Book Name:</label>
          <input type="text" class="form-control" id="bname" placeholder="Enter a Book name" name="bname" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
          <label for="aname" class="form-label">Author Name:</label>
          <input type="text" class="form-control" id="aname" placeholder="Enter a Author name" name="aname" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
          <label for="pyear" class="form-label">Publish Year:</label>
          <input type="text" class="form-control" id="pyear" placeholder="Enter a Publish year" name="pyear" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
          <label for="cars">Number of Quantity:</label>
          <select name="quantity" id="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>