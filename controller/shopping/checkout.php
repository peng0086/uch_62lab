<?php
    
  session_start();
  $pid = $_GET["id"];
  $count = $_POST["count"];
  if(isset($_SESSION['username'])){
    
    mergeData($pid, $count, $_SESSION['username']);
    echo "<script>location.href = '../../form/shopping/shoppingCart.php'</script>";
  }else {
    echo "<script>alert('login first!!');location.href = '../../form/login.php'</script>";
  }

  
  
  function mergeData($pid, $count, $usernamet){

    include '../../DB/DB.php';
    $sql = "SELECT orderList FROM orderdeteil where username = '". $usernamet ."' ;";
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
      $data_str = $row['orderList'];
      $json = json_decode($data_str, true);
      $elementCount  = count($json);
      $find = 0;
      for ($i=0; $i < $elementCount; $i++) { 
        $pid_temp = $json[$i]['productID'];
        $count_temp = $json[$i]['count'];
        if($pid == $pid_temp){
          $count_temp+=$count;
          $find++;
        }
        $json[$i]['count'] = $count_temp;
        
      }
      if($find==0){
        array_push($json, array("productID" => $pid, "count" => $count)) ;
      }
      $temp = json_encode($json);
      $sql2 = "UPDATE orderdeteil SET orderList  = '". $temp ."' WHERE username = '".$usernamet."';";
      mysqli_query($conn, $sql2)?"update susses":"error";
    }else{
      $sql2 = "INSERT INTO orderdeteil (orderList ,username ) VALUES('[{\"productID\": ". $pid ." ,\"count\": ". $count ."}]','". $usernamet ."');";
      $conn->query($sql2)?"insert susses":"error";
      
    }
    $conn->close();
    
  }
  

?>