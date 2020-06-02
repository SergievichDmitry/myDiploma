<?php
        require "db.php";
    ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main_page.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Одежда</title>
</head>
<body>

<header>
    <section class="header_top">
        <input id="elastic" class="search" type="text" placeholder="Поиск товара">
        <?php if( isset($_SESSION['logged_user']) ) : ?>
        <a href="admin/admin.php" class="link">Новое объявление</a>
        Добрый день, <?php echo $_SESSION['logged_user']->login; ?>! <br>
        <a href="logout.php" class="link">Выйти</a>
    </section>

    <section class="header_bottom">
        <H1>TWB - Trading Without Borders</H1>
        <H3 class = "num_items">Объявлений: </H3>
        <input class="link" id="sort_from_up" type="button" onclick="" value="ПО УБЫВАНИЮ">
        <input class="link" id="sort_from_down" type="button" onclick="" value="ПО ВОЗРАСТАНИЮ">
        <a href="direct.php" class="link">Почта</a>
        <a href="my_goods.php" class="link">Мои товары</a>
    </section>
    <?php else : ?>
    <a href="login.php" class="link">Новое объявление</a>
    Вы не авторизованы! <br>
    <a href="login.php" class="link">Авторизоваться</a><br>
    <a href="signup.php" class="link">Регистрация</a>
    </section>

    <section class="header_bottom">
        <H1>TWB - Trading Without Borders</H1>
        <H3 class = "num_items">Объявлений: </H3>
        <input class="link" id="sort_from_up" type="button" onclick="" value="ПО УБЫВАНИЮ">
        <input class="link" id="sort_from_down" type="button" onclick="" value="ПО ВОЗРАСТАНИЮ">
        <a href="login.php" class="link">Почта</a>
        <a href="login.php" class="link">Мои товары</a>
    </section>
    <?php endif; ?>
</header>

<section class="page">
    <section class="menu_side">
        <ul class="nav">
            <li class="main-menu">
                <a href="index.php">Главное меню</a>
            </li>
            <li class="catalogue">
                <a href>Каталог</a>
                <a href="boots.php">Обувь</a>
                <a href="clothes.php">Одежда</a>
                <a href="accesory.php">Аксессуары</a>
            </li>
            <li class="blog">
                <a href="blog.php">Блог</a>
            </li>
            <li class="settings">
                <a href>Настройки</a>
            </li>
        </ul>
    </section>

    <section class="goods" link="red" vlink="#cecece">
        <div class="clothes-out"></div>
    </section>
</section>

<footer>Designed and created by Dmitry Sergievich, 2020. TWB trade mark.</footer>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/main_clothes.js"></script>
</body>
</html>