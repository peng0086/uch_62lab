<?php
    include '../../DB/DB.php';

    if(isset($_POST['update'])) {

        $cid = $_GET['cid'];
        
        $reply = $_POST['reply'];

        $query = " update comment set reply = '".$reply."' where cid = '".$cid."'";
        $result = mysqli_query($conn,$query);

        if($result) {

            header("location:../../form/backstage/backcomment.php");

        } else {

            echo ' 請確認你的數值 ';

        }
    } else {

        header("location:../../form/backstage/backcomment.php");

    }

    $conn->close();
?>