<?
include('incl/connect.php');
include('incl/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
    include('incl/header.php');
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'regist') {
            include('pages/registration.php');
        } elseif ($page == 'login') {
            include('pages/login.php');
        } elseif ($page == 'main') {
            include('pages/main.php');
        } elseif ($page == 'profile') {
            include('pages/profile.php');
        } elseif ($page == 'delete_cat') {
            include('pages/delete_cat.php');
        } elseif ($page == 'add') {
            include('pages/add.php');
        } elseif ($page == 'admin') {
            include('pages/admin.php');
        } elseif ($page == 'basket') {
            include('pages/basket.php');
        } elseif ($page == 'all_category') {
            include('pages/all_category.php');
        } elseif ($page == 'delete_cat') {
            include('pages/delete_cat.php');
        } elseif ($page == 'delete') {
            include('pages/delete.php');
        } elseif ($page == 'update') {
            include('pages/update.php');
        }
        elseif ($page == 'tovar_once') {
            include('pages/tovar_once.php');
        }
        elseif ($page == 'order') {
            include('pages/order.php');
        }
        elseif ($page == 'add_cat') {
            include('pages/add_cat.php');
        }
    } else {
        include('pages/main.php');
    }
    ?>
</body>
</html>