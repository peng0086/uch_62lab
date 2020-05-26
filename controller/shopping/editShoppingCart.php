<?php 
  include '../../DB/DB.php';

  session_start();
  if(isset($_POST['id_a'])&&isset($_POST['count'])){
    
      updateList($_POST['id_a'], $_POST['count']);

    // 抓 如果前面是結帳 就走結帳 不是 回shopping cart
    if($_POST['isDone']=='結帳'){

      $username = $_POST['receptUsername'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      echo $username;
      // query is exist ? 
      $sql = "SELECT * FROM recipient WHERE name = '".$_SESSION['username']."' ";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $sql = "UPDATE recipient SET username='".$username."', phone='".$phone."', address='".$address."' WHERE name='".$_SESSION['username']."'";
        echo $sql;
        mysqli_query($conn, $sql)?"insert susses":"error";

      } else {
        // add recipient info 
        $sql = "INSERT INTO recipient VALUES( '".$_SESSION['username']."', '".$username."', '".$phone."', '".$address."' )";
        mysqli_query($conn, $sql)?"insert susses":"error";


      }
      
     

      $conn->close();
      
      echo "<script>location.href = '../../form/shopping/shoppingCartCheck.php'</script>";
    
    }

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
    $sql2 = "UPDATE shoppingcart SET orderList  = '". json_encode($json2) ."' WHERE username = '".$_SESSION['username']."';";
    echo mysqli_query($conn, $sql2)?"update susses":"error";
    $conn->close();

  }

?>