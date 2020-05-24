<?php
	header("Content-Type:text/html; charset=utf-8");
	$name = $_POST['name'];	
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$info = $_POST['info'];

	if ($name=="" || $stock=="" || $price=="" || $info=="" ){
			echo "<script>alert('請輸入完整資料!! ');location.href = '../../form/backstage/addproduct.php';</script>";
	}else{
// upload file
		if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){

			if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK) {

                $temp = $_FILES['my_file']['tmp_name'];
                $target = '../../imgs/prod/' .$_FILES['my_file']['name'];
                $targetFull = '/62lab/imgs/prod/' .$_FILES['my_file']['name'];
                echo  $target ;
                             
                if (file_exists($target)){
                    echo "<script>location.href = '../../form/backstage/backproduct.php';</script>";
                } else {
                    move_uploaded_file($temp, $target);
                }

            } else {
                echo "<script>alert('Upload Error');location.href = '../../form/backstage/backproduct.php';</script>";
            }
        }

		include '../../DB/DB.php';

		$sql = "INSERT INTO product VALUES(0, '".$name."', '".$price."', '".$stock."', '".$info."', '".$target."')";
		
		if ($conn->query($sql) === TRUE) {
		  
			echo "<script>alert('上傳成功!!!');location.href = '../../form/backstage/backproduct.php';</script>";
			
		}

	}

	$conn->close();

?>	