<?php
require_once "models/Student.php";

class StudentsController
{
    public function actionIndex (){
        $object = new Student();
        return $data = $object->getAllStudents();
    }

    public function actionCreate() {

    }
}
