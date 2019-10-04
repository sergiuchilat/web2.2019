<?php


class User
{
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function login ($username, $password) {
        return ($username === 'admin' && $password === '1234');
    }
}
