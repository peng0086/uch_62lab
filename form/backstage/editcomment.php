<?php include './top.php'; ?>

    <?php 
        include '../../DB/DB.php';

        $cid = $_GET['getid'];
        $sql = " SELECT * FROM member JOIN comment ON member.mid = comment.mid where cid ='".$cid."'";
        $result = $conn -> query($sql);

        while($row = mysqli_fetch_assoc($result)) {

            echo "<div class='main'>
                <span>$row[name]的訊息回覆</span>
                </div>
                <br><br><br><hr><br>";

            echo "<div class='edit-content'>   
                    <form action='../../controller/backstage/updatecomment.php?cid=$row[cid]' class='edit-form' method='POST'>
                        <p>姓名 : $row[name]</p>

                        <p>內容 : $row[messenge]</p>";

            if($row['reply'] == NULL) {

                echo "  <p>回覆 : 
                        <textarea name='reply' cols='75' rows='7' placeholder='輸入要回覆的內容...' ></textarea></p>

                        <button class='edit-form' name='update'>確認修改</button>
                        <button class='edit-form' name='back' onclick='location.href='./backcomment.php''>取消修改</button> 
                    </form>
                </div>";

            } else {

                echo "  <p>舊回覆 : $row[reply]</p>

                        <p>新回覆 : 
                        <textarea name='reply' cols='75' rows='7' placeholder='輸入要回覆的內容...' ></textarea></p>

                        <button class='edit-form' name='update'>確認修改</button>
                        <button class='edit-form'>取消修改</button>
                    </form>
                </div>";
            }
        }
        
        $conn->close();
    ?>

<?php include './foot.html'; ?>