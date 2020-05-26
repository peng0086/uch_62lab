<?php 

	$mid = $_POST['id'];
	$name = $_POST['name'];
	$pwd = $_POST['pw'];

	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];

	$date = date("Y:m:d H:i:s",time()+28800);
	$level = 0;

	if($mid=="" || $name=="" || $pwd=="") {
			echo "<script>alert('請輸入完整資料!! ');location.href = '../form/register.php';</script>";
	}else {

		if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK) {

            $temp = $_FILES['my_file']['tmp_name'];
            $target = '../imgs/member/' .$_FILES['my_file']['name'];
        	$targetFull = '/62lab/imgs/member/' .$_FILES['my_file']['name'];
                         
            if (file_exists($target)){
                echo "<script>location.href = '../form/register.php';</script>";
            } else {
                move_uploaded_file($temp, $target);
            }

        } else {
            echo "<script>alert('Upload Error');location.href = '../form/register.php';</script>";
        }

		include '../DB/DB.php';

		// $sql = "INSERT INTO member VALUES(0, '".$mid."', '".$name."', '".mod5($pwd)."', '".$date."', '".$level."')";
		$sql = "INSERT INTO member VALUES(0, '".$mid."', '".$name."', '".$pwd."', '".$date."', '".$level."', '".$phone."', '".$address."', '".$email."', '".$targetFull."')";
		if($conn->query($sql)) {
			echo "<script>alert('完成註冊 !! ');location.href = '../form/login.php';</script>";
		}else {
			echo "<script>alert('帳號有人申請過了 !! ');location.href = '../form/register.php';</script>";		 	
		}

	}
	$conn->close();
	
?>