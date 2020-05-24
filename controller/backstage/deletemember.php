<?php
    include '../../DB/DB.php';
    
    if(isset($_GET['Del'])) {

        $id = $_GET['Del'];
        $query = " delete from member where id = '".$id."' ";
        $result = mysqli_query($conn,$query);

        if($result) {

            echo "<script>alert('會員刪除成功!!');location.href = '../../form/backstage/backmember.php';</script>";

        } else {

            echo "<script>alert('會員刪除失敗!!');location.href = '../../form/backstage/backmember.php';</script>";

        }

    } else {

        header("location:../../form/backstage/backmember.php");
        
    }
    
    $conn->close();
?>