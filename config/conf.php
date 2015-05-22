<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE); //TO do: Auf 0 umstellen


define('UPLOAD_PATH', 'img/uploads/');

define('STAT_HIDDEN', 0);
define('STAT_PUBLIC', 1);
define('STAT_ADMIN', 2);

function __autoload($class) {

    include_once "class/$class.php";
}

if ($_GET['a'] == 'save' || $_GET['a'] == 'login' || $_GET['a'] == 'admin' || $_GET['a'] == 'manage') {
    $userManager = new UserManager();
}

if ($_GET['a'] == 'catalog' || $_GET['a'] == 'new' || $_GET['a'] == 'edit'){
    $productmanager = new ProductManager();
}

if ($_GET['a'] == 'regist' || $_GET['a'] == 'save'){
    $validator = new Validator();
}