<?php

//Тестовый контроллер

class NewsController
{
    public function actionIndex(){
        echo "Welcome to this page";
        return true;
    }
    public function actionView(){
        echo "Welcome to this page1";
        return true;
    }
}

