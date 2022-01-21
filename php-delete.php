<?php
    require_once("connDB.php");
    $id = $_GET["id"];
    // echo $id;
    $sql = "DELETE  FROM `students` WHERE id =".$id;
    //mysqli_query($conn,$sql);
    /**
     * 這邊使用exec()這個函式，exec()只會回傳這個SQL指令傳到DB後"影響了幾筆資料"
     * 比如這個指令刪除了一筆資料..就會回傳1
     * 刪除了二筆資料..就會回傳2
     * 沒有刪除資料或是執行失敗..會回傳0
     */
    $pdo->exec($sql);
    header("Location:php-mysql-2.php");
?>