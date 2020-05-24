<?php include '../top.php'; ?>
<?php 
	@session_start();

	if (!isset($_SESSION['username'])) {
		
		echo "<script>location.href = '../home.php'</script>";
	}


    include '../../DB/DB.php';

    @$name = $_SESSION['username'];

    $sql = " SELECT * FROM member where name ='".$name."'";
    $result = $conn -> query($sql);

    echo "<div class='section'>";

	while($row = $result->fetch_assoc()){

		$levelarr = array("會員","員工","管理者");
        $temp = $levelarr[(int)$row['level']];

		echo "<h1>$temp ".$row["name"]." 的個人主頁</h1>

			<div class='article'>
				<img src=".$row["imgPath"].">
				<h2>電話:".$row["phone"]."</h2>
				<h2>信箱:".$row["email"]."</h2>
				<h2>地址:".$row["address"]."</h2>

			</div>";

		echo "<form method='post' enctype='multipart/form-data'  action='./editpersonal.php?nm=".$row["name"]."' class='edit-form'>
				<div id='content' style='padding-left: 39%;'>
					<input type='submit' name='img' value='更換圖片'>
					<input type='submit' name='update' value='更新資料'>
				</div>
		   	</form>";

	}
	echo "</div>";

	$conn->close();

?>

<?php include '../foot.html'; ?>