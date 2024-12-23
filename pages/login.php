<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Вы не зарегистированы </p>',
        '<p class="error">Не верный логин или пароль</p>'
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
            <form action="" method="POST" name="login" class="form">
                <h1>Авторизация</h1>
                <input type="text" name="email" placeholder="Почта">
                <? if (isset($_POST['login'])) {
            $sql = "SELECT * FROM `users` WHERE `email`='$email'";
            $res = $connect->query($sql)->fetch(2);

            if (empty($email)) {
                echo $errors[0];
                $flag = 'false';
            } elseif (!$res) {
                echo $errors[1];
                $flag = 'false';
            }
        } ?>
                <input type="password" name="password" placeholder="Пароль">
                <? if (isset($_POST['login'])) {
            if (empty($password)) {
                echo $errors[0];
                $flag = 'false';
            } elseif (!password_verify($password, $res['password'])) {
                echo $errors[2];
                $flag = 'false';
            }
        } ?>
                <input class="form_btn" type="submit" name="login" value="Авторизоваться">
            </form>
            <? if (isset($_POST['login'])) {
        if ($flag != 'false') {
            $_SESSION['USER'] = $res['id'];
            header('Location: ?page=profile');
        }
    }
    ?>
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