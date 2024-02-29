<?php

class AuthenticationService {

    public function __construct() {
    }

    public function login($username, $password) {
        $user = $this->getUser($username);
        if ($user != null) {
            if ($user['password'] == $password) {
                session_start();
                $_SESSION['user'] = $user;
                //$this->saveSessionIdInCookie();
                return true;
            }
        }
        return false;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function getUser($username) {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($user['username'] == $username) {
                return $user;
            }
        }
        return null;
    }

    public function getUsers() {
        return [
            ['username' => 'admin', 'password' => 'admin', 'role' => 'admin'],
            ['username' => 'user', 'password' => 'user', 'role' => 'user']
        ];
    }

    public function isLogged() {
        session_start();
        return isset($_SESSION['user']);
    }

    public function saveSessionIdInCookie() {
        setcookie('PHPSESSID', session_id(), time() + 60 * 60 * 24 * 30, '/');
    }

}