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
    $sql = "SELECT * FROM `category` WHERE `id` = '$id'";
    $сategory = $connect->query($sql)->fetch(2);
}
?>
<br><br><br>
<p>Удалить категорию "<?=$сategory['name']?>"?</p>
<a class="btn_log" href="?page=delete_cat&del&id=<?=$id?>">Да</a>
<a class="btn_reg" href="?page=all_category">Нет</a>
<?
if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `category` WHERE `id` = '$id'";
    $book = $connect->query($sql);
    echo '<script> document.location.href="?page=all_category"</script>';
}
?>
</body>
</html>