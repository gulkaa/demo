
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
    <main>
        <div class="catalog">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `tovar` WHERE `id` = '$id'";
                $tovar = $connect->query($sql)->fetch(2);
            ?>
                <div class="products_wrapper">
                    <a href="?page=tovar_once&id=<?= $id ?>" class="product">
                    <img src="<?= $tovar['img'] ?>" alt="">
                        <div class="price">
                            <p>Цена:<?= $tovar['price'] ?> ₽</p>
                        </div>
                        <p><?= $tovar['description'] ?></p>
                        <p><?= $сategory['name'] ?></p>
                    </a>
                </div>
                <?
            }
            if (isset($_SESSION['USER'])) {
                if ($USER['role'] == 2) { ?>
                    <a class="btn_reg" href="?page=update&id=<?= $id ?>">Редактировать</a>
                    <a class="btn_reg" href="?page=delete&id=<?= $id ?>">Удалить</a>
            <? }
            }
            ?>
        </div>
    </main>
</body>

</html>