<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tovar` WHERE `id` = '$id'";
    $tovar = $connect->query($sql)->fetch(2);
    $old_img = $tovar['img'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        if ($_FILES['img']['name'] == null) {
            $img = $old_img;
        } else {
            $img = 'assets/img/' . time() . $_FILES['img']['name'];
        }
        $flag = 'true';
        $errors = [
            '<p class="error">Заполните поле ввода</p>'
        ];
    }
}
?>

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
        <div class="out_wrapper">
            <form action="" method="POST" name="update" enctype="multipart/form-data">
                <h2>Редактировать</h2>
                <input type="text" name="name" placeholder="Название" value="<?= $tovar['name'] ?>">
                <?php
                if (isset($_POST['update'])) {
                    if (empty($name)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="text" name="price" placeholder="Цена" value="<?= $tovar['price'] ?>">
                <?php
                if (isset($_POST['update'])) {
                    if (empty($price)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <textarea name="description" id=""><?= $tovar['description'] ?> </textarea>
                <?php
                if (isset($_POST['update'])) {
                    if (empty($description)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="file" name="img">
                <input type="submit" value="Редактировать" name="update">
            </form>
            <? if (isset($_POST['update'])) {
                if ($flag != 'false') {
                    move_uploaded_file($_FILES['img']['tmp_name'], $img);
                    $sql = "UPDATE `tovar` SET 
        `name`='$name', 
        `price`='$price',
        `description`='$description',
        `img`='$img' WHERE `id`= '$id'";
                    $res = $connect->query($sql);
                    echo '<script> document.location.href="?page=admin"</script>';
                }
            } ?>

        </div>
    </main>
    <footer>
        <div class="header_wrapper footer_wrapper">
            <a href="" class="logo footer_logo">
                <svg width="113" height="113" viewBox="0 0 113 113" fill="" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M56.6674 0L56.6679 1.48894e-06C56.7583 31.0711 81.9289 56.2418 113 56.3321V56.3325C81.873 56.4231 56.6677 81.6843 56.6677 112.833C56.6677 112.888 56.6678 112.944 56.6679 113C56.6677 113 56.6676 113 56.6674 113L56.6677 112.833C56.6677 81.6553 31.4153 56.376 0.248305 56.3323C31.3594 56.2888 56.577 31.1001 56.6674 0ZM0 56.3325L5.43761e-07 56.3322L0.109126 56.3323L0 56.3325Z"
                        fill="" />
                </svg>
                <p>Природный Оазис</p>
            </a>
            <div class="footer_text_wrapper_out">
                <div class="footer_text_wrapper">
                    <p class="footer_title">КОНТАКТЫ</p>
                    <a href="">+7 (999) 999-99-99</a>
                    <a href="">Vk: Природный Оазис</a>
                    <a href="">Tg: Природный Оазис</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>