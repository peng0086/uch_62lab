<?php include "./top.php" ?>

	 <div class="main">
        <a href="./addproduct.php">上架</a>
	</div>
	<br><br><br><hr><br>

		<div class="edit-content">
			<p>
				<form method="post" enctype="multipart/form-data"  action="../../controller/backstage/uploadCont.php" class="edit-form">
					
						<p>名稱:&nbsp&nbsp&nbsp&nbsp<input type="text" class="edit-form" name="name"></p>
						<p>價格:&nbsp&nbsp&nbsp&nbsp<input type="text" class="edit-form" name="price" placeholder="例:100 ..."></p>
						<p>庫存:&nbsp&nbsp&nbsp&nbsp<input type="text" class="edit-form" name="stock" placeholder="例:100 ..."></p>
						<p>資訊:&nbsp&nbsp&nbsp
							<textarea name="info" cols="53" rows="7" placeholder="輸入產品資訊..." ></textarea>
						</p>
						<p>圖片:&nbsp&nbsp&nbsp
							<input type="file" class="edit-form" name="my_file">
						</p>

					<div id="content" style="padding-left: 25%;">
						<input type="submit" name="sub" value="送出">
						<input type="reset" name="Reset" value="重設">
						<input type="button" name="sub" value="結束上傳" onclick="location.href='./backproduct.php'">
					</div>
			   	</form>
			</p>
		</div>

<?php include './foot.html';?>