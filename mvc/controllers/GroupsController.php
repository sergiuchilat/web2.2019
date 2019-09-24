<?php
require_once "models/Group.php";

class GroupsController
{
    public function actionIndex (){
        $object = new Group();
        return $data = $object->getAllGroups();
    }

    public function actionCreate() {

    }
}
