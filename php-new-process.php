<?php
    require_once("connDB.php");

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    
    $sql = "INSERT INTO `students`(name,phone,mail) VALUES ('$name','$phone','$mail')";
    /** 
     * 這邊沒問題,就是這樣執行的
     * 除了查詢query()之外,像是新增/更新/刪除這三類指令都只需要回傳成功或失敗就可以了.
     * 因此會使用exec()就好，但使用query()也是可以的，因為執行的動作都是把sql執令送給資料庫去執行
     * 差別只在回傳的資料不一樣，query()->fetch()類的函可以回傳查詢到的資料；exec()只會回傳影響的筆數
    */
    $pdo->exec($sql);  
    header("Location:php-mysql-1.php");
    // header("Refresh:3;url=php-mysql-1.php");
?>