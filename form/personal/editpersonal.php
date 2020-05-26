<?php include '../top.php'; ?>
<?php 
    @session_start();

    if (!isset($_SESSION['username'])) {
        
        echo "<script>location.href = '../home.php'</script>";
    }
        
    include '../../DB/DB.php';

    @$name = $_GET['nm'];
    @$img = $_POST['img'];
    @$update = $_POST['update'];

    $sql = " SELECT * FROM member where name ='".$name."' ";
    $result = $conn -> query($sql);

    while($row = mysqli_fetch_assoc($result)) {

        $levelarr = array("會員","員工","管理者");
        $temp = $levelarr[(int)$row['level']];

        echo "<div class='section'>
            <h1>$temp ".$name." 的個人資料更改</h1>
            </div>";

        echo "<div class='edit-content'>   
            <form enctype='multipart/form-data' action='../../controller/personal/updatepersonal.php?nm=$row[name]' class='edit-form' method='POST'>

            <center><p>$row[name]</p></center>";

        if(isset($img)){
            echo "<center><p><img src='$row[imgPath]'></p></center>

                <p>圖片更新:
                <input type='file' class='edit-form' name='my_file'></p>

                <button class='edit-form' name='img'>確認修改</button>";
        }

        if(isset($update)){
            echo "<p>帳號 : 
                <input type='text' class='edit-form' name='pwd' placeholder='請輸入密碼' value='$row[mid]' disabled='disabled'></p>

                <p>密碼 : 
                <input type='text' class='edit-form' name='pwd' placeholder='請輸入密碼' value='$row[pwd]'></p>

                <p>電話 : 
                <input type='text' class='edit-form' name='phone' placeholder='請輸入電話' value='$row[phone]'></p>
               
                <p>信箱 : 
                <input type='text' class='edit-form' name='email' placeholder='請輸入email' value='$row[email]'></p>
                <button class='edit-form' name='update'>確認修改</button>";
        }

        echo "<button class='edit-form'>取消修改</button>
            <br>

            </form>
        </div>";
    }
    
    $conn->close();

        
?>
<br><hr>

<?php include '../foot.html'; ?>