<?php @session_start();
	switch ($data){
		case 1:
			$_SESSION['check'] = 1;
			echo "<script>location.href = '../form/backstage/backproduct.php'</script>";
			break;
		case 2:
			$_SESSION['check'] = 2;	
			echo "<script>location.href = '../form/backstage/backhome.php'</script>";
			break;
		default:
			echo "<script>location.href = '/62LAB/form/store.php'</script>";
	}
?>