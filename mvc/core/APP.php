<?php
class APP
{
    private static $instance = null;

    public static function getInstance () {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function run (){
        //todo refactor routing
        require_once 'models/Student.php';
        require_once 'models/Group.php';

        $model = $_GET['model'];
        $action = $_GET['action'];

        switch ($model) {
            case "students":
                //todo refactor get pageTitle
                $student = new Student();
                $data = $student->getList();
                $pageTitle = 'List - Students';
                break;
            case "groups":
                $group = new Group();
                $data = $group->getList();
                //todo refactor get pageTitle
                $pageTitle = 'List - Groups';
                break;
        }

        $viewPath = "views/{$model}/{$action}.php";

        if(empty($model) || empty($action) || !file_exists($viewPath)) {
            $viewPath = "views/errors/e404.php";
        }
        ob_start();
        include $viewPath;
        $pageContent = ob_get_contents();
        ob_end_clean();

        include 'layouts/custom.php';

    }
}
