<?php
include_once 'db.php';
// $sql = "SELECT * FROM user_details, book_details, book_isbn
//             WHERE 
//                 user_details.book_id = book_details.id AND
//                 user_details.isbn_no = book_isbn.id AND  user_details.user_id=$id";

$sql = "SELECT u.id AS uid,username,book_name,author_name,b.id AS bid, 
                isbn_number,i.id AS isbid,ud.id AS udid, ud.book_id,ud.isbn_no,ud.user_id,
                date_of_request,ud.status
            FROM user_details AS ud, book_details AS b, book_isbn AS i,user AS u
    WHERE 
        ud.book_id = b.id AND
        ud.isbn_no = i.id AND
        ud.user_id = u.id AND ud.user_id=$id";
$result = $conn->query($sql);
// $result->num_rows;
// session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library list</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <?php
        $id = $_SESSION['id'];
        $type = $_SESSION['type'];
    ?>  -->
</head>
<body>
    <div class="row">
        <div class="container">
            <span style="margin-left:850px;"><a href="dashboard.php"><button type="button" class="btn btn-primary">Dashboard</button></a></span>
        <!-- <span style=""><a href="book.php"><button type="button" class="btn btn-primary">Add Books</button></a></span><br> -->
        <h1>Request Book Details  - <?=$username;?></h1>
            <table class="table responsive" id="sort">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">ISBN Number</th>
                        <th scope="col">Date of Request</th>
                        <th scope="col">Status</th>
                        
                <tbody>
                    <?php
                    $i=1;
                    while ($row = $result->fetch_assoc()) {

                      
                    ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$row["book_name"];?></td>
                            <td><?=$row["author_name"];?></td>
                            <td><?= $row["isbn_number"];?></td>
                            <td><?=$row["date_of_request"];?></td>
                            <td><?=$row["status"];?></td>
                            <?php
                            if($type == 'User' && $row["status"] == "Issued") {?>
                                    <td>
                                    <a href="returned.php?uid=<?=$row["uid"];?>&bookid=<?=$row["book_id"];?>&isbid=<?=$row["isbid"];?>"><button type="button" class="btn btn-primary" name="rday">Return</button></a>
                                    </td>
                                </form>
                            <?php  }else{?>
                                <td></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>

                </tbody>
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
        $("#sort").DataTable({
            columnDefs: [{
                type: 'date',
                targets: [3]
            }],
        });
    });
</script> 