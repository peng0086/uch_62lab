<?php include './top.php';?>

<?php include '../DB/DB.php';

	$i=0;
	$sql = "SELECT * FROM member JOIN comment ON member.mid = comment.mid";

	$result = $conn->query($sql);

	echo "<table>";
	    while($row = $result->fetch_array()) {

			$i++;
			$i%2==0 ? $color="222222" : $color="111111";
			echo "<tr bgcolor=$color>
					<td width=20>$i</td>
					<td>$row[name]</td>
					<td>".substr($row['phone'],0,  4)."***".substr($row['phone'],  -3)."</td>
					<td>".substr($row['email'],0,  5)."*******@***"."</td>
					<td>$row[comdate]</td></tr>";
			echo "<tr bgcolor=$color height=60>
					<td colspan=5>$row[messenge]</td></tr>";

			if($row["reply"] != ""){ 
				echo "<td bgcolor=$color colspan=2>系統回覆:</td>
						<td bgcolor=$color colspan=3>$row[reply]</td>";
			}
			echo "<tr height=20></tr>";

		}
	echo "</table>";
	echo "共".$i."則留言<p>"."<hr>";

	$conn->close();

	@session_start();

	if (!isset($_SESSION['username']) || $_SESSION['check'] < 0) {
		
		echo "<div id='content'>
			<p>您尚未登入，登入後才能留言!!!</p>
			<p>若尚未註冊，歡迎前往註冊!!!</p>
			<p>
				<input type='button' value='登入' onclick=location.href='login.php'>
				<input type='button' value='註冊' onclick=location.href='register.php'>
			</p>
			</div>";

	}else {

		echo "<h2>歡迎 $_SESSION[username] 留言</h2>

			<div id='content'>
				<form method='post' action='../controller/commentCont.php'>
					<div id='form1' style='width:30%'>
						<p>留言:
							<textarea name='messenge' cols='53' rows='7'  placeholder='輸入你想要寫的內容...' ></textarea>
						</p>

					</div>
					<p>
						<input type='submit' name='sub' value='送出'>
						<input type='reset' name='Reset' value='重設'>
						<input type='button' name='sub' value='檢視留言' onclick=location.href='comment.php'>
					</p>
			   	</form>
			</div>";
	}

?>

<br><br><br><br><br><br><br><br><br><br><br><hr>

	
<?php include './foot.html';?>