<?php include './top.php';?>

	<div id="content">
		
		<?php
			$id = $_GET["pid"];

			include '../DB/DB.php';
			$sql = "SELECT * FROM product WHERE id = '".$id."' ";
			$result = $conn->query($sql);

			echo "<div class='section'>";

			while($row = $result->fetch_assoc()){

			echo "<div class='nav'><img src=".$row["imgPath"]."></div>";
  
  			echo "<div class='article'>
    				<h2>".$row["name"]."</h2>
    				<h2>價格:".$row["price"]." &nbsp&nbsp 庫存:".$row["stock"]."</h2>
    				<h2>介紹:".$row["info"]."</h3>

  				</div>";

  			echo "
				<form method='post' enctype='multipart/form-data'  action='../controller/shopping/addProdInCart.php?id=".$row["id"]."' class='edit-form'>
					<div id='content' style='padding-left: 37%;'>
						<input type='number' name='count' value='1'>
						<input type='submit' name='sub' value='加入購物車'>
						<input type='button' onclick=location.href='/62lab/form/store.php' value='再逛逛'>
					</div>
			   	</form>";

			}
			echo "</div>";

			$conn->close();
		?>

	</div>
	
<?php include './foot.html';?>



<!-- <form method='post' enctype='multipart/form-data'  action='../controller/product/addProdInCart.php?pid=".$row["id"]."' class='edit-form'> 
<form method='post' enctype='multipart/form-data'  action='./shoppingCart.php?pid=".$row["id"]."' class='edit-form'>-->