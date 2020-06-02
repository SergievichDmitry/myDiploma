<?php
        require "../db.php";
    ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main_page.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Добавить новость</title>
</head>
<body>

<header>
    <section class="header_top">
        <input class="search" type="text" placeholder="Поиск по сайту" required="">
        <a href="admin.php" class="link">Новое объявление</a>
        <?php if( isset($_SESSION['logged_user']) ) : ?>
        Добрый день, <?php echo $_SESSION['logged_user']->login; ?>! <br>
        <a href="../logout.php" class="link">Выйти</a>
        <?php else : ?>
        Вы не авторизованы! <br>
        <a href="../login.php" class="link">Авторизоваться</a><br>
        <a href="../signup.php" class="link">Регистрация</a>
        <?php endif; ?>
    </section>

    <section class="header_bottom">
        <H1>TWB - Trading Without Borders</H1>
        <a href="../later.php" class="link">Желания</a><br>
        <a href="../cart.php" class="link">Корзина</a>
    </section>
</header>

<section class="page">
    <section class="menu_side">
        <ul class="nav">
            <li class="main-menu">
                <a href="../index.php">Главное меню</a>
            </li>
            <li class="catalogue">
                <a href>Каталог</a>
                <a href="../boots.php">Обувь</a>
                <a href="../clothes.php">Одежда</a>
                <a href="../accesory.php">Аксессуары</a>
            </li>
            <li class="blog">
                <a href="../blog.php">Блог</a>
                <a href>Item 1</a>
                <a href>Item 2</a>
                <a href>Item 3</a>
            </li>
            <li class="settings">
                <a href>Настройки</a>
            </li>
        </ul>
    </section>

    <section>

        <div class="news-out"></div>

        <form>
            <h2> Добавить новость</h2>
            <p>Название новости: <input type="text" id="name_news"></p>
            <p>Описание: <textarea id="text_news"></textarea></p>
            <p>Изображение: <input type="text" id="img_news"></p>
            <input type="hidden" id="gid_news">
            <button class="add-to-db_news">Добавить</button>
        </form>
    </section>
</section>

<footer>Designed and created by Dmitry Sergievich, 2020. TWB trade mark.</footer>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/admin_blog.js"></script>
</body>
</html>