<?php include './top.php';?>

	<div id="content">
		<form method="post" action="../controller/loginCont.php">

			<p>帳號：</p>
				<p><input type="text" name="id" size="25%" maxlength="10"></p>
			<p>密碼：</p>
				<p><input type="password" name="pw" size="25%" maxlength="10"></p>
			<p>
				<input type="submit" name="sub" value="登入">
	        	<input type="button" name="sub" value="註冊" onclick="location.href='./register.php'">
			</p>
			
		</form>
	</div>
	
<?php include './foot.html';?>