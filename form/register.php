<?php include './top.php';?>

	<h2>會員註冊系統</h2>

	<div id="content">
		<p>
			<form method="post" action="../controller/registerCont.php">

				<p>帳號：<input type="text" name="id"></p>
				<p>稱呼：<input type="text" name="name"></p>
				<p>密碼：<input type="password" name="pw"></p>
				
				<p>
					<input type="submit" name="sub" value="送出">
					<input type="button" name="sub" value="返回登入頁面" onclick="location.href='./login.php'">
				</p>
		    </form>
		</p>
	</div>
	
<?php include './foot.html';?>