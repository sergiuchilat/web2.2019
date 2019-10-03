<?php
namespace Controllers;
require_once '../app/core/View.php';
use View;

class AuthController
{
    public function actionLogin (){
        return View::render('auth/login');
    }
}
