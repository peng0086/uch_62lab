<?php
	@session_start();
	$mid = $_POST['id'];
	$pwd = $_POST['pw'];
	$_SESSION['check'] = 0;
	if ($mid=="" || $pwd=="") {
			echo "<script>alert('請輸入帳號密碼!! ');location.href = '../form/login.php';</script>";
	}
	include '../DB/DB.php';

	$sql = "SELECT mid, pwd, level, name FROM member";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	if($mid == $row["mid"] && $pwd == $row["pwd"]){
				$data = $row["level"];
				$_SESSION['check'] = $data;
				
				$_SESSION['username'] = $row["name"];
				echo "<script>location.href = '../form/home.php'</script>";
	    	}
		}
    	if($mid != $row["mid"] && $mid != "\0") {
			echo "<script>alert('帳號密碼有誤!!');location.href = '../form/login.php'</script>";
		}	
	} 

	$conn->close();

?>