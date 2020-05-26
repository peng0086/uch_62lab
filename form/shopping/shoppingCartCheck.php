<?php include '../top.php';?>

<?php
  @session_start();

  include '../../DB/DB.php';

  $sql = "SELECT * FROM shoppingcart JOIN member on member.name = '".$_SESSION['username']."' WHERE username = '".$_SESSION['username']."' ";
  
  $result = $conn->query($sql);

  echo "<br><form id='form1' method='post' enctype='multipart/form-data' action='../../controller/shopping/resultShoppingCart.php' class='edit-form'>";

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

  echo "<center><p>共計: 新台幣 ".number_format(@$amount). " 元整</p></center>";

  // echo "<input id='cool' type='text' name='isDone' style='display:none;' value='結帳' >";
  echo "<center><p>基本資料 : </p></center>";


  $sql2 = "SELECT * FROM recipient WHERE name = '".$_SESSION['username']."' ";
  $result = $conn->query($sql2);
  if($row = $result->fetch_assoc()){
    @$username = $row['username'];
    @$phone = $row['phone'];
    @$address = $row['address'];

    echo "<center>姓名 : ".@$username."</center><p>";
    echo "<center>電話 : ".@$phone."</center><p>";
    echo "<center>地址 : ".@$address."</center><hr>";
  }
  echo "<div id='content' style='padding-left: 42%;'>
          <input type='submit' name='sub' value='確認'>
          <input type='button' onclick=location.href='/62lab/form/shopping/shoppingCart.php' value='更改訂單資訊'>
        </div>
        </form>";

  echo "<br><h3>由於商品單價高，本賣場只提供匯款後宅配!!!</h3>";

  $conn->close();

?>
<hr>

<?php include '../foot.html';?>