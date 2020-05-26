<!DOCTYPE html>
<?php 
	@session_start();

	if (!isset($_SESSION['username']) ||  $_SESSION['check'] == 0) {
		
		echo "<script>location.href = '../home.php'</script>";
	}


?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/62lab/css/style.css">
    <link rel="stylesheet" type="text/css" href="/62lab/css/back.css">
    <link rel="stylesheet" type="text/css" href="/62lab/css/moving.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</head>
<body background="../../imgs/bglight.png" bgproperties=fixed>
    <div class="sidenav">
        <a href="backhome.php">首頁</a>

	<?php 
		if ( $_SESSION['check'] == 2) {
			echo "<a href='backmember.php'>會員資料</a>";
		}

	?>
       
        <button class="dropdown-btn">商品區 
    		<i class="fa fa-caret-down"></i>
  		</button>
		<div class="dropdown-container">
			<a href="backproduct.php">瀏覽</a>
			<a href="addproduct.php">上架</a>
			<a href="depotproduct.php">補貨</a>
		</div>

        <a href="backcomment.php">留言區</a>
        <a href="../home.php">結束</a>
        <a href="../logout.php">登出</a>
    </div>
    <br>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script>
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}

	//Get the button
	var mybutton = document.getElementById("myBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
	</script>