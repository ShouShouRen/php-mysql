<?php
    require_once("connDB.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM `students` WHERE id =".$id;
    //$result = mysqli_query($conn,$sql);
    //$row = mysqli_fetch_assoc($result);

    /**
     * query()這個函式會執行把sql送到資料庫的動作
     * fetch()這個函式會把上一個函式query()執行的結果撈回來
     * PDO::FETCH_ASSOC是宣告fetch()這個函式要用什麼方式把結果撈回來
     *      FETCH_ASSOC=>資料的結果只有'欄位=>值'的陣列型式  比如 ['name'=>'mack']
     *      FETCH_NUM=>資料的結果只有'欄位索引值'=>值'的陣列型式 比如 [1=>'mack']
     *      FETCH_BOTH或不加參數=>資料的結果同時有欄位及欄位索引值 比如 ['name'=>'mack',1=>'mack']
     * $pdo->執行的結果一樣會指定給變數$row
     */
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="php-update.php" method="POST">
        <input type="text" name="name" placeholder="請輸入姓名" value="<?php echo $row["name"];?>">
        <input type="text" name="phone" placeholder="請輸入電話" value="<?php echo $row["phone"];?>">
        <input type="text" name="mail" placeholder="請輸入mail" value="<?php echo $row["mail"];?>">
        <input type="hidden" name="id" value="<?php echo $row["id"];?>">
        <input type="submit" value="修改">
    </form>
</body>

</html>