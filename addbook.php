<?php
include_once 'db.php';

$sql = "SELECT * FROM book_details ORDER BY id DESC";
//$sql = "SELECT student.id,student.fullname,student.email_id,student.class_name,student.edu_year,subject_list.sub_name,subject_list.sub_code,subject_list.create_at  FROM student left JOIN subject_list ON student.id = subject_list.stu_id ";

$result = $conn->query($sql);
$result->num_rows;
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>index table</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt_3">
        <button class="btn btn-success"><a href="booklist.php"> Add Books </a></button>
        <a href="book_list.php"><button class="btn btn-primary"><img src="book.jpg" alt="" style="width:20px; height:40%;"> Book List </button></a>
    </div>

    <div class="row">
        <div class="container">

            <h1>library Admin's List </h1>
            <table class="table responsive" id="sort">
                <thead>
                    <tr>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Publish Year</th>
                        <th scope="col">Number Of Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $row["book_name"]; ?></td>
                            <td><?= $row["author_name"]; ?></td>
                            <td><?= $row["publish_year"]; ?></td>
                            <td><?= $row["number_of_quantity"]; ?></td>
                            <td>
                                <!-- <a href="#"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="#"><button type="button" class="btn btn-danger">Delete</button></a> -->
                                <a href="#"><button type="button" class="btn btn-success">Add Isbn Number</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                </thead>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js'></script>


</body>

</html>
<script>
    $(document).ready(function() {

        ,.
        $("#sort").DataTable({
            columnDefs: [{
                type: 'date',
                targets: [3]
            }],
        });
    });
</script>