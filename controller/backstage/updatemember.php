<?php
    include '../../DB/DB.php';

    $id = $_GET['id'];

    if(isset($_POST['update'])) {
        
        $level = $_POST['level'];

        $query = " update member set level = '".$level."' where id = '".$id."' ";
        $result = mysqli_query($conn,$query);

        if($result) {

            header("location:../../form/backstage/backmember.php");
            
        } else {

            echo ' 請確認你的數值 ';

        }

    } else if(isset($_POST['update2'])) {

        $pwd = $_POST['pwd'];   
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if ($pwd=="" || $phone=="" || $email=="") {
            echo "<script>alert('請輸入完整資料!! ');location.href = '../../form/backstage/editmember.php';</script>";
        } else {

            $query = " update member set pwd = '".$pwd."', phone = '".$phone."', email = '".$email."' where id = '".$id."' ";
            $result = mysqli_query($conn,$query);
            echo "<script>alert('個人資訊更改成功!!');location.href = '../../form/backstage/backmember.php';</script>";
                
        }

    } else {

        header("location:../../form/backstage/backmember.php");

    }

    $conn->close();
?>