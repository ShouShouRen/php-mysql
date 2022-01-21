<?php
//一樣引入pdo
require_once("connDB.php");

// $user = "test";
// $password = "test";
// $host = "localhost";
// $db = "phptest";

//$conn = mysqli_connect($host, $user, $password) or die("資料庫連線錯誤");
//mysqli_select_db($conn, $db);
//mysqli_query($conn, "SET NAMES utf8");

$sql = "SELECT * FROM `students`";
//$result = mysqli_query($conn, $sql);

/**
 * fetchAll()的效果是一次把sql結果的所有資料都撈回來，而fetch()則是一次一筆
 * 等同於原生的mysqli_fetch_all()的效果
 * fetchAll()回傳的資料會以二維陣列的方式存在。
 */
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// $row = mysqli_fetch_assoc($result);
// echo $row["id"].$row["name"].$row["phone"].$row["mail"];

// while($row = mysqli_fetch_assoc($result)){
//     echo $row["id"].$row["name"].$row["phone"].$row["mail"]."<br>";
// }
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td{
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>

<body>

    <?php
    echo "<table>";
    /**
     * while(){}回圈的用法是指一次fetch()一筆資料直到$row沒有資料時就停止回圈
     * 但這個用法就可能會造成每次迴圈都對資料庫做一次連線和查找的動作,對資料庫的負擔較大
     * 再者是因為$row寫在回圈中，因此這個變數就只在這個回圈中有效，當回圈結束時，
     * $row的值可能是最後一筆資料或是null
     * 所以如果考量資料庫的效能及資料存取的方便性，先一次性的取出會比較好
     */
    //while ($row = mysqli_fetch_assoc($result)) {
    /**
     * 改用foreach()來取出二維陣列$result中的資料,
     * $key表示第幾筆資料從0開始計算
     */
    foreach($result as $key=>$row){
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["mail"]."</td>";
        echo "<td><a href='php-detail.php?id=".$row["id"]."'>修改</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    /**
     * 因為$result是在回圈外時先取好所有的資料，
     * 因此回圈結束後，$result還是有所有的資料，
     * 因此可以做第二次的使用，不用再重新連資料庫下別的SQL指令。
     */
    echo "<div>以上共有";
    echo count($result);
    echo "筆資料</div>";
    ?>
</body>

</html>

</html>