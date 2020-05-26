<?php include './top.php';?>

  <?php

    include '../DB/DB.php';
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    echo "<div id='storeBox'>";
        
        while($row = mysqli_fetch_array($result)) {

          echo "<div class='box'>
                  <a target='_self' href='./prod.php?pid=$row[0]'>
                    <img src='$row[5]'>
                    <div>$row[1] $:$row[2]</div>
                  </a>
                </div>";
        }

    echo "</div>";
        
    $conn->close();
    
  ?>

<br><hr>

<?php include './foot.html';?>