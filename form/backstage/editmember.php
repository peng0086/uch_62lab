<?php include './top.php'; ?>

    <?php 
        include '../../DB/DB.php';

        @$id = $_GET['GetID'];
        @$all = $_GET['all'];
        $sql = " SELECT * FROM member where id ='".$id."' or id ='".$all."' ";
        $result = $conn -> query($sql);

        while($row = mysqli_fetch_assoc($result)) {

            $levelarr = array("會員","員工","管理者");
            $temp = $levelarr[(int)$row['level']];

            echo "<div class='main'>
                    <span>$row[name]的帳號資訊</span>
                    </div>
                    <br><br><br><hr><br>";

            echo "<div class='edit-content'>   
                    <form action='../../controller/backstage/updatemember.php?id=$row[id]' class='edit-form' method='POST'>
                    <center><p><img src='$row[imgPath]'></p></center>

                    <p>暱稱 : $row[name]</p>

                    <p>帳號 : $row[mid]</p>";
                        
               
            if(isset($id)) {
                echo "<p>原權限 : $temp </p>

                    <p>新權限 :
                    <input type='radio' name='level' value='0'> 會員
                    <input type='radio' name='level' value='1'> 員工
                    <input type='radio' name='level' value='2'> 管理者

                    <br><br>

                    <button class='edit-form' name='update'>更改權限</button>";

            }else if(isset($all)) {
                echo "<p>密碼 : 
                    <input type='text' class='edit-form' name='pwd' placeholder='請輸入密碼' value='$row[pwd]'></p>

                    <p>電話 : 
                    <input type='text' class='edit-form' name='phone' placeholder='請輸入電話' value='$row[phone]'></p>
                   
                    <p>信箱 : 
                    <input type='text' class='edit-form' name='email' placeholder='請輸入email' value='$row[email]'></p>
                    <button class='edit-form' name='update2'>更改資料</button>";

            }
            echo "<button class='edit-form'>取消更改</button>
                </form>
            </div>";
        }
        
        $conn->close();
    ?>

<?php include './foot.html'; ?>