<?php
  include '../../DB/DB.php';
    
  session_start();

  if(isset($_SESSION['username'])&&isset($_POST['sub'])){

    $sql = "SELECT orderList FROM shoppingcart where username = '".$_SESSION['username']."' ";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

      $orderList = $row['orderList'];

      $date = date("Y:m:d H:i:s",time()+28800);
      
      $sql2 = "INSERT INTO orderdeteil (orderList ,username ) VALUES('". $orderList ."','". $_SESSION['username'] ."');";
      $conn->query($sql2)?"insert susses":"error";
      
      $sql3 = "DELETE FROM shoppingcart WHERE username = '". $_SESSION['username']."'";
      $conn->query($sql3)?"insert susses":"error";

//
  $sql = "SELECT * FROM orderdeteil  WHERE username = '".$_SESSION['username']."' ORDER BY id DESC LIMIT 0 , 1 ";
    
  $result = $conn->query($sql);

  if($rowA = $result->fetch_assoc()) {

    $data_str = $rowA['orderList'];
    $json = json_decode($data_str, true);
    
    $elementCount  = count($json);
    for ($i=0; $i < $elementCount; $i++) {
      $pid_temp = $json[$i]['productID'];
      $count_temp = $json[$i]['count'];

      $sql = "SELECT stock FROM product  WHERE id = '".$pid_temp."' ";
      $result = $conn->query($sql);
      if($rowA = $result->fetch_assoc()) {
        $temp = $rowA['stock'];
        if(($temp-$count_temp) >= 0){
          $temp -= $count_temp;
          $sql2 = "UPDATE product SET stock =". $temp." WHERE id = '".$pid_temp."' ";
          $conn->query($sql2)?"insert susses":"error";
          echo "susses";
        }else {
          $sql2 = "UPDATE product SET stock = 0 WHERE id = '".$pid_temp."' ";
          $conn->query($sql2)?"insert susses":"error";
          echo "susses =0 ";
        }
        echo "ss1";
        
      }
    }
  }
  
  
      echo "<script>location.href = '../../form/shopping/shoppingCartResult.php'</script>";
    }
    
  }else { echo "ss2";
    echo "<script>alert('login first!!');location.href = '../../form/login.php'</script>";
  }
  $conn->close();



?>