<?php
    require_once("connDB.php");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $id = $_POST["id"];
    $sql = "UPDATE `students` SET name='$name',phone='$phone',mail='$mail' WHERE id = ".$id;
    //mysqli_query($conn,$sql);

    //只要加入下列這一行,效果和mysqli_query($conn,$sql);是一樣的
    $pdo->exec($sql);
    header("Location:php-mysql-2.php");
?>