<?php

function getUsersList(){
    $users = require __DIR__ . '/db_users.php';
    return $users;
};

//getUsersList();

function existsUser(string $login): bool {

    $users = getUsersList();

    foreach ($users as $user){
        if ($user['login'] === $login) {
//            print_r(true);
            return true;
        }
    }
//    print_r(false);
    return false;
}

//existsUser ('user');

function checkPassword($login, $password): bool {
    $users = getUsersList();

//    $users = require __DIR__ . '/db_users.php';

    foreach ($users as $user){
        if ($user['login'] === $login && $user['password'] === md5($password)) {
//            print_r(true);
            return true;
        }
    }
//    print_r(false);
    return false;
}

//checkPassword ('user', '123');

function getCurrentUser(): ?string {
    $loginFromSession = $_SESSION['login'] ?? null;
    $passwordFromSession = $_SESSION['password'] ?? null;
    if (checkPassword($loginFromSession, $passwordFromSession)){
        return $loginFromSession;
    }
    return null;
}