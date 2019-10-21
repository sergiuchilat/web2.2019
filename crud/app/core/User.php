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
        if ($username === 'admin' && $password === '1234') {
            $_SESSION['USER']['authorised'] = true;
            $_SESSION['USER']['name'] = 'Ion Creanga';
            return true;
        }
        return false;
    }

    public function isAuthorised () {
        return $_SESSION['USER']['authorised'];
    }
}
