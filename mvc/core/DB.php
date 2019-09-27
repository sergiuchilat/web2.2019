<?php
namespace Core;

class DB
{
    public $connection = null;

    public function connect () {
        $this->connection = true;
    }
    public function select () {
        return [
            [
                'name' => 'IS11Z',
                'email' => 'is11z@gmail.com'
            ],
            [
                'name' => 'IS21Z',
                'email' => 'is21z@gmail.com'
            ],
            [
                'name' => 'IS31Z',
                'email' => 'is31z@gmail.com'
            ]
        ];
    }

    public function insert () {

    }

    public function update(){

    }

    public function delete(){

    }
}
