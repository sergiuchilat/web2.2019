<?php
namespace Controllers;

require_once "core/DB.php";
require_once "models/Group.php";
use Models\Group;
use Core\DB;



class GroupsController
{
    public function actionIndex (){
        $db = new DB();
        $object = new Group();
        return $data = $object->getAllGroups();
    }

    public function actionCreate() {

    }
}
