<?php
require_once '../app/core/DB.php';
require_once '../app/controllers/MainController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/ProductsController.php';
require_once '../app/core/User.php';
use User;

class APP
{
    private static $instance = null;
    public static $db = null;

    public static function getInstance () {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function handleRequest($model, $action) {
        $modelName = ucfirst($model);
        $actionName = ucfirst($action);
        $controller = "Controllers\\{$modelName}Controller";
        $method = "action{$actionName}";

        $objController = new $controller;

        ob_start();
        $objController->$method();
        $viewContent = ob_get_contents();
        ob_end_clean();
        View::loadLayout('default', $viewContent);
    }

    public function run () {
        APP::$db = new DB();
        APP::$db->open('localhost', 'root', '', 'store', 'utf8');
        $user = User::getInstance();
        require_once '../app/routes.php';
    }
}
