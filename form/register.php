<?php include './top.php';?>

	<h2>會員註冊系統</h2>

	<div id="content">
		<p>
			<form method="post" enctype="multipart/form-data" action="../controller/registerCont.php">

				<p>帳號：&nbsp<input type="text" name="id"></p>
				<p>稱呼：&nbsp<input type="text" name="name"></p>
				<p>密碼：&nbsp<input type="password" name="pw"></p>
				<p>電話：&nbsp<input type="text" name="phone"></p>
				<p>地址：&nbsp<input type="text" name="address"></p>           
                <p>信箱：&nbsp<input type="text" name="email"></p>
				<p>圖片：<input type="file" name="my_file"></p>
				<p>
					<input type="submit" name="sub" value="送出">
					<input type="button" name="sub" value="返回登入頁面" onclick="location.href='./login.php'">
				</p>
		    </form>
		</p>
	</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>
	
<?php include './foot.html';?>