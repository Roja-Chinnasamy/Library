<?php
include_once 'db.php';
$sql = "SELECT * FROM book_details ORDER BY id DESC";
$result = $conn->query($sql);
$result->num_rows;
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
    <?php
        $userid = $_SESSION['id'];
        $type = $_SESSION['type'];
        // $uid = $_REQUEST['user_id'];
    ?> 
</head>
<body>
    <div class="container mt_3">
   
        <!-- <a href="book_list.php"><button class="btn btn-primary"><img src="book.jpg" alt="" style="width:20px; height:40%;"> Book List </button></a> -->
    </div>

    <div class="row">
        <div class="container">
        <?php if($type == 'Admin' || 'User') {?>
        <span style="margin-left:850px;"><a href="dashboard.php"><button type="button" class="btn btn-primary">Dashboard</button></a></span>
        <?php  }?>

        <?php if($type == 'Admin') {?>
        <span style=""><a href="book.php"><button type="button" class="btn btn-primary">Add Books</button></a></span><br>
        <?php  }?>

            <h1>Library Book Details</h1>
            <table class="table responsive" id="sort">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Publish Year</th>
                        <th scope="col">Number Of Quantity</th>
                        <th scope="col">Action</th>
                <tbody>
                    <?php
                    $i=1;
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$row["book_name"];?></td>
                            <td><?=$row["author_name"];?></td>
                            <!-- <td><?= $row["isbn_no"];?></td> -->
                            <td><?=$row["publish_year"];?></td>
                            <td><?=$row["number_of_quantity"];?></td>
                            <td>
                                <?php if($type == 'Admin') {?>
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addIsbn<?=$row['id'];?>">Add ISBN</button>
                                <?php  }?>
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$row['id'];?>">View ISBN</button>
                                <?php if($type == 'User') {?>
                                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#getbooks<?=$row['id'];?>">Get Books</button> -->
                                <?php  }?>   
                            </td>

                            
                            <!-- Add Modal -->                            
                            <div id="addIsbn<?=$row['id'];?>" class="modal fade" role="dialog">
                            <form class="form-signin" role="form" action="isbn.php" method="post">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">ADD ISBN NUMBER - <?=$row['book_name'];?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                            <?php
                                            $count = $row["number_of_quantity"];
                                            for ($i = 1; $i <= $count; $i++) {
                                            ?>
                                                <div class="row col-md-12">
                                                    <div class="col-md-12">
                                                        <label>ISBN Number <?=$i;?>:</label>
                                                        <input type="text" name="isbn<?=$i;?>">
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" name="submit" value="submit">
                                            <input type="hidden" name="b_id" value="<?=$row['id'];?>">
                                            <input type="hidden" name="count" value="<?=$count;?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>

                            

                            <!-- View Modal -->
                            <div id="myModal<?=$row['id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><?=$row['book_name'];?> - ISBN Number List</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $sql2 = "SELECT * FROM book_isbn WHERE book_id = '$row[id]'";
                                        $result2 = $conn->query($sql2);
                                        ?>
                                        <div class="container">
                                            <?php
                                            $sno1 =1;
                                             while ($row2 = $result2->fetch_assoc()) {
                                                ?> 
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <label><?=$sno1;?>.</label>
                                                        <?=$row2['isbn_number'];?>
                                                       <a href="request_insert.php?uid=<?=$userid;?>&bid=<?=$row["id"];?>&isbn_id=<?=$row2['id'];?>"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$row['id'];?>">Request Book</button></a>
                                                    </div><hr />
                                                </div>
                                                <!-- <div class="row col-md-6">
                                                    <div class="col-md-1">
                                                        <?=$sno1;?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?=$row2['isbn_number'];?>
                                                    
                                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$row['id'];?>">Request Book</button>
                                                    </div>
                                                </div><hr /> -->
                                                <?php
                                                $sno1++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                                </div>
                            </div>

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