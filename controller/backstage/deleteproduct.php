<?php
    include '../../DB/DB.php';
    
    if(isset($_GET['Del'])) {

        $id = $_GET['Del'];
        $query = " delete from product where id = '".$id."' ";
        $result = mysqli_query($conn,$query);

        if($result) {

            echo "<script>alert('商品刪除成功!!');location.href = '../../form/backstage/backproduct.php';</script>";

        } else {

            echo "<script>alert('商品刪除失敗!!');location.href = '../../form/backstage/backproduct.php';</script>";

        }

    } else {

        header("location:../../form/backstage/backproduct.php");
        
    }
    
    $conn->close();
?>