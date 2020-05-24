<?php 

  session_start();
  if(isset($_POST['id_a'])&&isset($_POST['count'])){

      updateList($_POST['id_a'], $_POST['count']);
      echo "<script>location.href = '../../form/shopping/shoppingCart.php'</script>";
    
  }else {
    echo "<script>alert('login first!!');location.href = '../../form/login.php'</script>";
  }

  function updateList($arr_id, $arr_count){
    $elementCount  = count($arr_count);
    $json2 = array();
    for ($i=0; $i < $elementCount; $i++) { 
      array_push($json2, array("productID" =>  $arr_id[$i], "count" =>$arr_count[$i])) ;
    }
  
    include '../../DB/DB.php';
    $sql2 = "UPDATE orderdeteil SET orderList  = '". json_encode($json2) ."' WHERE username = '".$_SESSION['username']."';";
    echo mysqli_query($conn, $sql2)?"update susses":"error";
    $conn->close();

  }



?>