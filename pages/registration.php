<?php
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_r = $_POST['password_r'];
    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Не верный формат почты</p>',
        '<p class="error">Вы уже зарегистированы </p>',
        '<p class="error">Пароль должен включать не менее 6 символов</p>',
        '<p class="error">Пароли не совпадают</p>'
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
            <form action="" class="form" name="reg" method="POST">
                <h1>Регистрация</h1>
                <p class="error">Заполните все поля</p>
                <input type="text" name="name" placeholder="Имя*">
                <?php
                if (isset($_POST['reg'])) {
                    if (empty($name)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="text" name="surname" placeholder="Фамилия*">
                <?php
                if (isset($_POST['reg'])) {
                    if (empty($surname)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="text" name="email" placeholder="Почта*">
                <?php
                if (isset($_POST['reg'])) {
                    if (empty($email)) {
                        $flag = 'false';
                        echo $errors[0];
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $flag = 'false';
                        echo $errors[1];
                    } else {
                        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
                        $res = $connect->query($sql)->fetchColumn();
                        if ($res != 0) {
                            $flag = 'false';
                            echo $errors[2];
                        }
                    }
                } ?>
                <input type="password" name="password" placeholder="Пароль*">
                <?php
                if (isset($_POST['reg'])) {
                    if (empty($password)) {
                        $flag = 'false';
                        echo $errors[0];
                    }
                } ?>
                <input type="password" name="password_r" placeholder="Повторите пароль*">
                <?php
                if (isset($_POST['reg'])) {
                    if (empty($password_r)) {
                        $flag = 'false';
                        echo $errors[0];
                    } elseif (strlen($password) < 6) {
                        $flag = 'false';
                        echo $errors[3];
                    } elseif ($password != $password_r) {
                        $flag = 'false';
                        echo $errors[4];
                    }
                } ?>
                <input class="form_btn" type="submit" name="reg" value="Зарегистрироваться">
            </form>
            <?php
            if (isset($_POST['reg'])) {
                if ($flag != 'false') {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users`(`name`, `surname`, `email`, `password`, `role`) 
            VALUES ('$name','$surname','$email','$password','1')";
                    $res = $connect->query($sql);
                    echo '<script> document.location.href="?page=login"</script>';
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