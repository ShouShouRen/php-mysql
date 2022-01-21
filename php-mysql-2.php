<?php
$user = "test";
$password = "test";
$host = "localhost";
$db = "phptest";

$conn = mysqli_connect($host, $user, $password) or die("資料庫連線錯誤");
mysqli_select_db($conn, $db);
mysqli_query($conn, "SET NAMES utf8");

$sql = "SELECT * FROM `students`";
$result = mysqli_query($conn, $sql);

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
        table,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>

<body>
<a href="php-new.php">新增資料</a>
    <table>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["phone"];?></td>
                <td><?php echo $row["mail"];?></td>
                <td><a href="php-delete.php?id=<?php echo $row["id"]?>" onclick="return confirm('確定要刪除?')">刪除</a></td>
                <td><a href="php-detail.php?id=<?php echo $row["id"]?>">修改</a></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>