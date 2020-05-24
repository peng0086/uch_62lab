<?php
	header("Content-Type:text/html; charset=utf-8");
	include '../../DB/DB.php';

	$name = $_GET['nm'];

	if(isset($_POST['update'])) {
		

		$pwd = $_POST['pwd'];	
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		if ($pwd=="" || $phone=="" || $email=="") {
			echo "<script>alert('請輸入完整資料!! ');location.href = '../../form/personal/editpersonal.php';</script>";
		} else {

	        $query = " update member set pwd = '".$pwd."', phone = '".$phone."', email = '".$email."' where name = '".$name."' ";
	        $result = mysqli_query($conn,$query);
	        echo "<script>alert('個人資訊更改成功!!');location.href = '../../form/personal/page.php';</script>";
	            
	    }

    } else if(isset($_POST['img'])) {

		if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){

            $temp = $_FILES['my_file']['tmp_name'];
            $target = '../../imgs/member/' .$_FILES['my_file']['name'];
            $targetFull = '/62lab/imgs/member/' .$_FILES['my_file']['name'];
                         
            if (file_exists($target)){
                echo "<script>location.href = '../../form/personal/updatepersonal.php';</script>";
            } else {
                move_uploaded_file($temp, $target);

                $query = " update member set imgPath = '".$targetFull."' where name = '".$name."' ";
		        $result = mysqli_query($conn,$query);

		        echo "<script>alert('個人頭貼更改成功!!');location.href = '../../form/personal/page.php';</script>";
		   	}

        } else {
            echo "<script>alert('Upload Error');location.href = '../../form/personal/page.php';</script>";
        }           

    } else {

        header("location:../../form/personal/page.php");
    }

    $conn->close();
?>	