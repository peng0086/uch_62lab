<?php include './top.php'; ?>

    <?php 
        include '../../DB/DB.php';

        $id = $_GET['GetID'];
        $sql = " SELECT * FROM product where id ='".$id."'";
        $result = $conn -> query($sql);

        while($row = mysqli_fetch_assoc($result)) {

            echo "<div class='main'>
                <span>商品：$row[name]</span>
                </div>
                <br><br><br><hr><br>";

            echo "<div class='edit-content'>   
                <form enctype='multipart/form-data' action='../../controller/backstage/updateproduct.php?id=$row[id]' class='edit-form' method='POST'>

                <p>品名 :&nbsp
                <input type='text' class='edit-form' name='name' placeholder='請輸入品名' value='$row[name]'></p>

                <p>價格 :&nbsp
                <input type='text' class='edit-form' name='price' placeholder='請輸入價格' value='$row[price]'></p>

                <p>庫存 :&nbsp
                <input type='text' class='edit-form' name='stock' placeholder='請輸入庫存'' value='$row[stock]'></p>
               
                <p>商品介紹 :
                <textarea name='info' cols='75' rows='7' placeholder='請輸入商品介紹'>$row[info]</textarea></p>

                <p>圖片更新 :
                <input type='file' class='edit-form' name='my_file'></p>

                <button class='edit-form' name='update'>確認修改</button>
                <button class='edit-form'>取消修改</button>

                </form>
            </div>";
        }    
        
        $conn->close();
    ?>

<?php include './foot.html'; ?>