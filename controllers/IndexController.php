<?php
/**
 * формирование главной страницы
 * @param $smarty Шаблонизатор
 */

/**
 * @var $CheckedStatus - проверка на выбранный фильтр. Если фильтр(ы) выбран,
 * то заполняется из $_GET['position']
 * @param $smarty
 * @param $db
 */
function indexAction($smarty, $db)
{
    $smarty->assign('pageTitle', 'Главная страница сайта');
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
}


