<?php
    $action = $_POST['action'];

    require_once "../db.php";

    require_once 'function.php';
    switch ($action){
        case 'init':
            init();
            break;
        case 'selectOneGoods':
            selectOneGoods();
            break;
        case 'updateGoods':
            updateGoods();
            break;
        case 'newGoods':
            newGoods($x = $_SESSION['logged_user']->login);
            break;
        case 'loadGoods':
            loadGoods();
            break;
        case 'loadSingleGoods':
            loadSingleGoods();
            break;
        case 'init_blog':
            init_blog();
            break;
        case 'selectOneNews':
            selectOneNews();
            break;
        case 'updateNews':
            updateNews();
            break;
        case 'newNews':
            newNews();
            break;
        case 'loadNews':
            loadNews();
            break;
        case 'loadSingleNews':
            loadSingleNews();
            break;
        case 'loadBoots':
            loadClass($x = "boots");
            break;
        case 'loadClothes':
            loadClass($x = "clothes");
            break;
        case 'loadAccesory':
            loadClass($x = "accesory");
            break;
        case 'loadUserGoods':
            loadUserGoods($x = $_SESSION['logged_user']->login);
            break;
        case 'deleteItem':
            deleteItem();
            break;
        case 'deleteNews':
            deleteNews();
            break;
        case 'loadDirect':
            loadDirect($x = $_SESSION['logged_user']->login);
            break;
        case 'newAnswer':
            newAnswer($x = $_SESSION['logged_user']->login);
            break;
        case 'deleteMessage':
            deleteMessage();
            break;
    }