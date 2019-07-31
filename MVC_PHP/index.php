<?php

//Это все - фронт-контроллер

//Вывод ошибок 0/1
ini_set('display_errors',1);
error_reporting(E_ALL);

//Подключение файлов системы (укажите свои пути)
define('ROOT',$_SERVER['DOCUMENT_ROOT']);
require_once (ROOT.'\components\Router.php');

//Обращаемся к Роутеру

Router::run();

?>
