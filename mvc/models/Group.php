<?php


class Group
{
    public function getAllGroups() {
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


    public function create () {
        return 'Student created';
    }
}
