<?php include '../top.php';?>

<?php
  @session_start();

  include '../../DB/DB.php';

  $sql = "SELECT * FROM orderdeteil WHERE username = '".$_SESSION['username']."' ";
  $result = $conn->query($sql);

  echo "<br><form id='form1' method='post' enctype='multipart/form-data' action='../../controller/shopping/editShoppingCart.php' class='edit-form'>";

    echo "<table style='background-color:#111;'>";

    if($row = $result->fetch_assoc()) {

      $data_str = $row['orderList'];
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
              <td><input type='number' class='count' name='id_a[]' style='display:none;' value='".$pid_temp."'></td>
              <td><input type='number' name='count[]' value='".$count_temp."'></td>
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

  echo "<center><p>共計:$amount</p></center>";

  echo "<div id='content' style='padding-left: 42%;'>
          <input type='submit' name='sub' value='結帳'>
          
          <input type='button' onclick=location.href='/62lab/form/store.php' value='再逛逛'>
        </div>
        </form>";

  echo "<br><h3>由於商品單價高，本賣場只提供匯款後宅配!!!</h3>";

  $conn->close();

?>
<hr>

<?php include '../foot.html';?>