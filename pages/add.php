<?php
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $img = 'assets/img/' . time() . $_FILES['img']['name'];
    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>'
    ];
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
            <form action="" method="POST" name="add" enctype="multipart/form-data">
                <h2>Добавить</h2>
                <input type="text" name="name" placeholder="Название">
                <?php
                if (isset($_POST['add'])) {
                    if (empty($name)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="text" name="price" placeholder="Цена">
                <?php
                if (isset($_POST['add'])) {
                    if (empty($price)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <textarea name="description" id="" placeholder="Описание"> </textarea>
                <?php
                if (isset($_POST['add'])) {
                    if (empty($description)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="file" name="img">

                <? if (isset($_POST['add'])) {
                    if ($_FILES['img']['name'] == null) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <select name="category_id" id="">
                    <option value="0" selected hidden>Категория новости</option>
                    <?php
                    $sql = "SELECT * FROM `category`";
                    $result = $connect->query($sql);
                    foreach ($result as $category) { ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <? }
                    ?>
                </select><br>
                <input сlass="form_btn" type="submit" value="Добавить" name="add">
            </form>
            <? if (isset($_POST['add'])) {
                if ($flag != 'false') {
                    move_uploaded_file($_FILES['img']['tmp_name'], $img);
                    $sql = "INSERT INTO `tovar`(`name`, `price`, `description`, `img`, `category_id`)
        VALUES ('$name','$price','$description','$img', '$category_id')";
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