<?php include '../top.php';?>

<?php
  @session_start();

  include '../../DB/DB.php';

  $sql = "SELECT * FROM orderdeteil  WHERE username = '".$_SESSION['username']."' ORDER BY id DESC LIMIT 0 , 1 ";
  
  $result = $conn->query($sql);

    echo "<table style='background-color:#111;'>";

    if($rowA = $result->fetch_assoc()) {

      $data_str = $rowA['orderList'];
      $json = json_decode($data_str, true);
      
      $elementCount  = count($json);
      $find = 0;
      $amount = 0;
      $sum = 0;
      for ($i=0; $i < $elementCount; $i++) {
        $pid_temp = $json[$i]['productID'];
        $count_temp = $json[$i]['count'];
        $sql = "SELECT * FROM product WHERE id = '".$pid_temp."' ";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
          $sum = $row['price']*$count_temp;

          echo "<tr>
              <td width=20%><img src=".$row['imgPath']."></td>
              <td width=20%>$row[name]</td>

              <td>$count_temp /個</td>
              <td width=20%>$:$sum</td>

            </tr>";

          echo "<tr height=10></tr>";      
        }

        $amount += $sum ;
      }
     
    }else{
      echo "<h1>尚未有購物清單!!!</h1>";
    }
    echo "</table>";

  echo "<center><h1>共計: 新台幣 ".number_format(@$amount). " 元整</h1></center>";

  echo "<div id='content'>
          <input type='button' onclick=location.href='/62lab/form/store.php' value='返回商場'>
        </div>";

  echo "<h1>已將此筆訂單,交由後台人員處理<br>確認無誤後,出貨日為三到五個工作天<br>感謝您在本賣場的消費!!!</h1>";

  $conn->close();

?>
<hr>

<?php include '../foot.html';?>