<?php

session_start();

//Проверка есть ли в сессии информация об отчетах
if (!$_SESSION) {
    $_SESSION['defective'] = 0;
    $_SESSION['realization'] = 0;
}

include_once '../config/config.php';
include_once '../library/mainFunctions.php';

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

loadPage($smarty, $pdo, $controllerName, $actionName);
