<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="/62lab/css/style.css">
  	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
  	<meta name="robots" content="noindex,follow" />
  
	<title>登峰造極</title>
	
</head>
<body background="/62lab/imgs/bglight.png" bgproperties=fixed>
	<div id="top">
		<h1>燈峰造極<br>汽機車客製化車燈</h1>		
		<ul>
			<li><a class="active" href="/62lab/form/home.php">首頁</a></li>
			<li><a href="/62lab/form/store.php">產品</a></li>
			<li><a href="/62lab/form/comment.php">留言板</a></li>

				<?php 
					@session_start();
					
					if (isset($_SESSION['username'])) {

						echo "<div id='onright2'>";
						switch ($_SESSION['check']) {
							case 1:
								echo "<li><a href='/62lab/form/personal/page.php'>$_SESSION[username]</a></li>";

								echo "<li><a href='/62lab/form/shopping/shoppingCart.php'>購物車</a></li>";
								echo "<li><a href='/62lab/form/backstage/backhome.php'>管理</a></li>";
								break;
							case 2:
								echo "<li><a href='/62lab/form/personal/page.php'>$_SESSION[username]</a></li>";

								echo "<li><a href='/62lab/form/shopping/shoppingCart.php'>購物車</a></li>";
								echo "<li><a href='/62lab/form/backstage/backhome.php'>管理</a></li>";
								break;
							case 0:
								echo "<li><a href='/62lab/form/personal/page.php'>$_SESSION[username]</a></li>";

								echo "<li><a href='/62lab/form/shopping/shoppingCart.php'>購物車</a></li>";
								break;
							}
						echo "<li><a href='/62lab/form/logout.php' color='red'>登出</a></li>";

						echo "</div>";
					}else {
						echo "<div id='onright'><li><a href='/62lab/form/login.php'>登入</a></li></div>";
					}					
				?>
				
		</ul>
	</div>
	<hr>