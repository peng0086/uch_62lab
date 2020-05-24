<?php 

	$mid = $_POST['id'];
	$name = $_POST['name'];
	$pwd = $_POST['pw'];
	$date = date("Y:m:d H:i:s",time()+28800);
	$level = 0;

	if($mid=="" || $name=="" || $pwd=="") {
			echo "<script>alert('請輸入完整資料!! ');location.href = '../form/register.php';</script>";
	}else {
		include '../DB/DB.php';

		$sql = "INSERT INTO member VALUES(0, '".$mid."', '".$name."', '".$pwd."', '".$date."', '".$level."')";
		
		if($conn->query($sql) === TRUE) {
		  
			echo "<script>alert('完成註冊 !! ');location.href = '../form/login.php';</script>";
			
		}else {
			echo "<script>alert('帳號有人申請過了 !! ');location.href = '../form/register.php';</script>";		 	
		}

	}
	$conn->close();
	
?>