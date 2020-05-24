<?php include './top.php'; ?>

    <div class="main">
        <a href="./backcomment.php">留言區</a>
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
            <td>編號</td>
            <td>姓名</td>
            <td>手機</td>
            <td>電子信箱</td>
            <td>填寫日期</td>
        </tr>

    <?php
        $i=0;

        $search = "";
        @$search = $_POST["search"];

        include '../../DB/DB.php';
        $sql = " SELECT * FROM member JOIN comment ON member.mid = comment.mid";

        if ($search == "") 
            $sql = " SELECT * FROM member JOIN comment ON member.mid = comment.mid ";
        else 
            $sql = " SELECT * FROM member JOIN comment ON member.mid = comment.mid where name like '%".$search."%' or messenge like '%".$search."%' or reply like '%".$search."%'";

        $result = $conn -> query($sql);

        while($row = $result->fetch_assoc()) {
    
            $i++;
            $i%2==0 ? $color="222222" : $color="111111";

            echo "<tr bgcolor=$color>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[phone]</td>
                    <td>$row[email]</td>
                    <td>$row[date]</td>";
            echo "<tr bgcolor=$color height=60>
                    <td colspan=5>$row[messenge]</td></tr>";

            echo "<tr bgcolor=$color>
                    <td colspan=1>回覆</td>
                    <td colspan=3>$row[reply]</td>";

            if($row['reply'] == NULL) {
                echo "<td>
                    <a href='editcomment.php?getid=$row[cid]'>回覆</a>
                    <a href='../../controller/backstage/deletecomment.php?Del=$row[cid]'>刪除</a></td></tr>";
            }else{
                echo "<td>
                    <a href='editcomment.php?getid=$row[cid]'>修改</a>
                    <a href='../../controller/backstage/deletecomment.php?Del=$row[cid]'>刪除</a></td></tr>";
            }

            echo "<tr height=20></tr>";
        }

        $conn->close();
    ?>

    </table>

<?php include './foot.html'; ?>