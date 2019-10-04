<?php
namespace Controllers;
require_once '../app/core/View.php';
require_once '../app/core/User.php';
use View;
use User;

class AuthController
{
    public function actionLogin (){

        /*if(
            (isset($_POST['username']) || isset($_POST['password']))
            &&
            (empty($_POST['username']) || empty($_POST['password']))
        ){
            return View::render('auth/login_error');
        }*/
        User::getInstance()->login($_POST['username'], $_POST['password']);
        return View::render('auth/login');
    }


}
