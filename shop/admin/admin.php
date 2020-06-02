<?php
    require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main_page.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Добавление товара</title>
</head>
<body>


<header>
    <section class="header_top">
        <input class="search" type="text" placeholder="Поиск доступен на главной странице" disabled>
        <a href="admin.php" class="link">Новое объявление</a>
                            Добрый день, <?php echo $_SESSION['logged_user']->login; ?>! <br>
                            <a href="/shop/logout.php" class="link">Выйти</a>
    </section>

    <section class="header_bottom">
        <H1>TWB - Trading Without Borders</H1>
        <a href="../later.php" class="link">Желания</a><br>
        <a href="../cart.php" class="link">Корзина</a>
        <a href="../direct.php" class="link">Почта</a>
        <a href="../my_goods.php" class="link">Мои товары</a>
    </section>
</header>

<main>
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

        <form>
            <h2> Заполните сведения о товаре:</h2>
            <p>Название : <input type="text" id="gname"></p>
            <p>Категория: <select id="gcategory"></p>
                <option value="boots">Обувь</option>
                <option value="clothes">Одежда</option>
                <option value="accesory">Аксессуары</option>
            </select>
            <p>Стоимость: <input type="text" id="gcost"></p>
            <p>Описание: <textarea id="gdesc"></textarea></p>
            <p>Изображение: <input type="text" id="gimg"></p>
            <p>Ваша почта для связи: <input type="text" id="gmail"></p>
            <p>Контактный телефон: <input type="text" id="gnumber"></p>
            <input type="hidden" id="gid">
            <button class="add-to-db">Добавить</button>
        </form>
    </section>
</main>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/admin.js"></script>

</body>
</html>