<?php include './top.php'; ?>
<?php 
    if ($_SESSION['check'] < 2) {
        echo "<script>location.href = './backhome.php'</script>";
    }
?>

    <div class="main">
        <a href="./backmember.php">會員區</a>
        <div class="search-container">
            <form action="" method="post">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <br><br><br><hr><br>
    <table class="quercase-table">
        <tr>
            <td>帳號</td>
            <td>稱呼</td>
            <td>密碼</td>
            <td>註冊日期</td>
            <td>權限等級</td>
        </tr>

    <?php
        $i=0;
        
        $search = "";
        @$search = $_POST["search"];

        include '../../DB/DB.php';
        $sql = "SELECT * FROM member";

        if ($search == "") 
            $sql = " SELECT * FROM member ";
        else 
            $sql = " SELECT * FROM member where id = '".$search."' or mid = '".$search."' or name = '".$search."' ";

        $result = $conn -> query($sql);

        while($row = $result->fetch_assoc()) {

            $i++;
            $i%2==0 ? $color="222222" : $color="111111";

            $levelarr = array("會員","員工","管理者");
            $temp = $levelarr[(int)$row['level']];

            echo "<tr bgcolor=$color>
                <td>$row[mid]</td>
                <td>$row[name]</td>
                <td>$row[pwd]</td>
                <td>$row[date]</td>
                <td>$temp</td>";

            echo "<td><a href='editmember.php?all=$row[id]'>詳細</a></td>
                <td><a href='editmember.php?GetID=$row[id]'>修改</a></td>
                <td><a href='../../controller/backstage/deletemember.php?Del=$row[id]'>刪除</a></td>
                </tr>";

            echo "<tr height=20></tr>";
        }	

		$conn->close();
    ?>
    
    </table>

<?php include './foot.html'; ?>