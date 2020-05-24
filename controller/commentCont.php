<?php
	@session_start();

	header("Content-Type:text/html; charset=utf-8");

	include '../DB/DB.php';

	$messenge = $_POST['messenge'];
	$date = date("Y:m:d H:i:s",time()+28800);
	$reply = NULL;

	if ( $messenge=="" ) {
			echo "<script>alert('請輸入留言內容!! ');location.href = '../form/comment.php';</script>";
	}else{
		$sql = "SELECT mid FROM member WHERE name = '".$_SESSION['username']."' ";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()){
	    	$mid = $row['mid'];

			$sql2 = "INSERT INTO comment VALUES(0,'".$date."','".$messenge."','".$reply."','".$mid."')";
			
			if ($conn->query($sql2) === TRUE) {		  
				echo "<script>alert('感謝您的意見,我們會盡量改善!');location.href = '../form/comment.php';</script>";		
			}
		}
			
	}

	$conn->close();
?>	