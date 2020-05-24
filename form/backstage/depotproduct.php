<?php include './top.php'; ?>

    <div class="main">
        <a href="./depotproduct.php">補貨</a>
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
            <td width="50" >編號</td>
            <td width="50" >品名</td>
            <td width="60" >庫存</td>
            <td width="100" >圖片</td>
            <td width="50" >補貨</td>
        </tr>

    <?php
        $i=0;

        $search = "";
        @$search = $_POST["search"];

        include '../../DB/DB.php';
        $sql = " SELECT * FROM product";

        if ($search == "") 
            $sql = " SELECT * FROM product order by stock ";
        else 
            $sql = " SELECT * FROM product where name like '%".$search."%' or stock = '".$search."' ";
        
        $result = $conn -> query($sql);

        while($row = $result->fetch_assoc()) {

            $i++;
            $i%2==0 ? $color="222222" : $color="111111";

                if($row["stock"] <= 20) {

                    echo "<tr bgcolor=$color>
                        <td>$i</td>
                        <td>$row[name]</td>

                        <td bgcolor='red'>$row[stock]</td>  
                        <td><img src='$row[imgPath]'></td>
                        <td>
                            <a href='editproduct.php?GetID=$row[id]'>前往補貨</a><br>
                        </td></tr>";

                    echo "<tr height=20></tr>";

                }

        }

        $conn->close();
    ?>

    </table>

<?php include './foot.html'; ?>