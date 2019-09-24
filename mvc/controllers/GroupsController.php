<?php
require_once "core/DB.php";
require_once "models/Group.php";

class GroupsController
{
    public function actionIndex (){
        $object = new Group(new DB());
        return $data = $object->getAllGroups();
    }

    public function actionCreate() {

    }
}
