<?php
namespace Controllers;
require_once '../app/core/View.php';
use View;

class MainController
{
    public function actionIndex (){
        return View::render('main/index');
    }

    public function actionContact (){
        return View::render('main/contact');
    }
}
