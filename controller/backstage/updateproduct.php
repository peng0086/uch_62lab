<?php
    header("Content-Type:text/html; charset=utf-8");
    
    if(isset($_POST['update'])) {

        $id = $_GET['id'];
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $info = $_POST['info'];

        if ($name=="" || $price=="" || $stock=="" || $info=="" ) {
            echo "<script>alert('請輸入完整資料!! ');location.href = '../../form/backstage/editproduct.php?GetID=$id';</script>";
        } else {
            // upload file
            if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK) {

                $temp = $_FILES['my_file']['tmp_name'];
                $target = '../../imgs/prod/' .$_FILES['my_file']['name'];
                $targetFull = '/62lab/imgs/prod/' .$_FILES['my_file']['name'];
                echo  $target ;
                             
                if (file_exists($target)){
                    echo "<script>location.href = '../../form/backstage/backproduct.php';</script>";
                } else {
                    move_uploaded_file($temp, $target);
                }

            } else {
                echo "<script>alert('Upload Error');location.href = '../../form/backstage/backproduct.php';</script>";
            }
        }

        include '../../DB/DB.php';

        $query = " update product set name = '".$name."', price = '".$price."', stock = '".$stock."', info = '".$info."', imgPath = '".$targetFull."' where id = '".$id."' ";
        $result = mysqli_query($conn,$query);

        if($result) {

            echo "<script>alert('商品資訊更改成功!!');location.href = '../../form/backstage/backproduct.php';</script>";
            
        } else {

            echo "<script>alert('更改失敗，請確認數值後再試!!');location.href = '../../form/backstage/backproduct.php';</script>";
        }

    } else {

        header("location:../../form/backstage/backproduct.php");

    }

    $conn->close();
?>