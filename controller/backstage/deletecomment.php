<?php
    include '../../DB/DB.php';

    if(isset($_GET['Del'])) {

        $cid = $_GET['Del'];
        $query = " delete from comment where cid = '".$cid."' ";
        $result = mysqli_query($conn,$query);

        if($result) {

            echo "<script>alert('留言刪除成功!!');location.href = '../../form/backstage/backcomment.php';</script>";

        } else {

            echo "<script>alert('留言刪除失敗!!');location.href = '../../form/backstage/backcomment.php';</script>";

        }

    } else {

        header("location:../../form/backstage/backcomment.php");

    }

    $conn->close();
?>