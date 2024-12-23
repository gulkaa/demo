<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Природный Оазис</title>
    <link rel="icon" type="image/svg" href="../images/logo.svg">
</head>

<body>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tovar` WHERE `id` = '$id'";
    $tovar = $connect->query($sql)->fetch(2);
}
?>
<br><br><br><br>
<p>Удалить товар?</p>
<a class="btn_log" href="?page=delete&del&id=<?=$id?>">Да</a>
<a class="btn_reg" href="?page=admin&id=<?=$id?>">Нет</a>
<?
if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `tovar` WHERE `id` = '$id'";
    $tovar = $connect->query($sql);
    echo '<script> document.location.href="?page=admin"</script>';
}
?>
</body>
</html>