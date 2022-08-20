<?php
include_once 'db.php';

if (isset($_POST['submit'])) {

    extract($_POST);
    for ($i=1;$i<=$count;$i++) {

        $isbn_number = 'isbn'.$i;
        $ss  = $$isbn_number;
        $created_at = date("Y-m-d h:i:s");
        $sql = "INSERT INTO book_isbn (isbn_number,book_id,created_at,updated_at,active) VALUES ('$ss','$b_id','$created_at','$created_at',1)";
        $result = $conn->query($sql);
    }

    echo ("<script language='JavaScript'>
                window. alert('Added successfully !');
                    window. location. href='http://localhost/library/booklist.php';
                </script>");
}

?>