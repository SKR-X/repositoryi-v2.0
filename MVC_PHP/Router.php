<?php

class Router
{

    static private $routes = array(

        //Ключ = роут; 1 значение = Класс; 2 значение = Метод;
        'news/([0-9]+)' => 'news/view',
        'news' => 'news/index',
        'products' => 'product/list',
        'forum' => 'forum/topic'
    );

    static private $route;
    static private $value;
    static private $parts;
    static private $controller;
    static private $action;
    static private $dir;

    //возвращает строку роута из URL

    static private function get_url()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            self::$route = trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    static public function run()
    {
        self::get_url();

        //Ищем существует-ли роут в массиве роутов

        foreach (self::$routes as $key => self::$value) {
            if (preg_match("~$key~", self::$route)) {

                //если да - делим значение под нужным ключом на 2 части описанных ранее

                self::$parts = explode('/', self::$value);

                //берем название нужного класса (контроллера)

                self::$controller = ucfirst(array_shift(self::$parts) . 'Controller');

                //берем название нужного метода (экшена)

                self::$action = 'action' . ucfirst(array_shift(self::$parts));

                //Выбираем наш контроллер (укажите свой путь)
            
                self::$dir = ROOT . '/controllers/' . self::$controller . '.php';

                if (file_exists(self::$dir)) {
                    include_once(self::$dir);
                    $method = self::$action;
                    $contr = new self::$controller;
                    if($contr->$method()) {
                        break;
                    }
                }
            }
        }
    }
}
