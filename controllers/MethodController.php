<?php

/**
 * Добавление слонов в базу данных.
 * Валидация не вынесена полностью.
 * Для большей надежности валидация должна проходить на сервере или дублироваться с Jq.validate
 * @param $smarty
 * @param $db
 */
function addinfoAction($smarty, $db)
{
    $flag = true;

    preg_match_all('/[0-9]+/', $_POST['characteristics'], $characteristics);

    $weight = $characteristics[0][0];
    $length = $characteristics[0][1];

    //Проверка соответствуют ли значения требуемым
    ($weight < 190 || $weight >= 210) ? $flag = false : null;
    ($length < 14 || $length > 16) ? $flag = false : null;

    //Создание массива для обработки PDO
    $info = [];
    $info['weight'] = $weight;
    $info['length'] = $length;

    if (!$flag) {
        $info['table'] = 'Defective';
        $db->insert($info);
        echo "Слон добавлен в брак";

    } else {
        $info['table'] = 'Realization';
        $db->insert($info);
        echo "Слон отправлен в продажу";
    }
}

/**
 * Функция для получения последних бракованных слонов
 * @param $smarty
 * @param $db
 * @return json с бракованными слонами
 */
function getlastelephantsAction($smarty, $db)
{
    $defective = $_SESSION['defective'];
    $realization = $_SESSION['realization'];

    //Проверяем есть ли значения в сессии
    if (!$defective && !$realization) {
        $defectiveElephants = $db->select('Defective', 'weight, length', null, null, 'weight');
        echo json_encode($defectiveElephants);
    } else {
        $defectiveElephants = $db->select('Defective', 'weight, length', null, "ID > $defective", 'weight');
        echo json_encode($defectiveElephants);
    }
}

/**
 * Функция для получения последних слонов.
 * @param $smarty
 * @param $db
 * @return json с количеством последних элементов
 */
function getcountelephantsAction($smarty, $db)
{
    $defective = $_SESSION['defective'];
    $realization = $_SESSION['realization'];

    //Получаем кол-во последних добавленных слонов
    $getCountDefective = $db->select('Defective', 'COUNT(*) as Defective', null, "ID > $defective");
    $getCountRealization = $db->select('Realization', 'COUNT(*) as Realization', null, "ID > $realization");

    //Получаем последние добавленные ID
    $lastIdDefective = $db->select('Defective', 'MAX(id) AS LAST_ID');
    $lastIdRealization = $db->select('Realization', 'MAX(id) AS LAST_ID');

    //Перезаписываем последние ID в сессии
    $_SESSION['defective'] = $lastIdDefective[0]['LAST_ID'];
    $_SESSION['realization'] = $lastIdRealization[0]['LAST_ID'];

    //Массив с количеством последних слонов
    $arrCountLastElephants = [];
    $arrCountLastElephants['Defective'] = $getCountDefective[0]['Defective'];
    $arrCountLastElephants['Realization'] = $getCountRealization[0]['Realization'];

    echo json_encode($arrCountLastElephants);
}