<?php
use Bramus\Router\Router;

require_once 'controllers/GroupsController.php';
require_once 'controllers/StudentsController.php';

class APP
{
    private static $instance = null;

    public static function getInstance () {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function handleRequest($controller, $action) {
        $modelName = ucfirst($controller);
        $actionName = ucfirst($action);
        $controller = "Controllers\\{$modelName}Controller";
        $action = "action{$actionName}";
        /*if (!class_exists($controller)){
            $controller = "Controllers\\ErrorController";
        }*/
        $objController = new $controller;
        if (!method_exists($objController, $action)){
            switch ($controller){
                /*case "Controllers\\ErrorController":
                    $action = 'action404';
                    break;*/
            }
        }
        //DB::getInstance()->connect();
        $objController->$action();
    }

    public function run () {
        $router = new Router();
        $router->get('/', function (){
            $this->handleRequest("Home", "Index");
        });
        $router->get('/home', function (){
            $this->handleRequest("Home", "Index");
    });
        $router->get('/groups', function (){
            $this->handleRequest("Groups", "Index");
        });
        $router->run();
    }

    public function run0 (){
        require_once 'controllers/GroupsController.php';
        require_once 'controllers/StudentsController.php';
        $appLocales = include 'locales/en/modules.php';

        $model = $_GET['model'];
        $action = $_GET['action'] ?: "index";
        $controllerName =  ucfirst($model) . "Controller";
        $methodName = "action" . ucfirst($action);

        $controllerObject = new $controllerName();
        $data = $controllerObject->$methodName();

        $viewPath = "views/{$model}/{$action}.php";

        if(
            empty($model) ||
            !method_exists($controllerObject, $methodName) ||
            !file_exists($viewPath)
        ) {
            $viewPath = "views/errors/e404.php";
        }
        ob_start();

        $pageTitle = $appLocales[$model]['title'];

        include $viewPath;
        $pageContent = ob_get_contents();
        ob_end_clean();

        include 'layouts/main.php';
    }
}
