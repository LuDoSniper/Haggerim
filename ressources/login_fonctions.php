<?php

require_once "bdd.php";

function try_login(string $id, string $pw){
    $bdd = new BDD();
    $search = $bdd->get_bdd()->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $search->execute([$id, $id]);
    $users = $search->fetchAll(PDO::FETCH_ASSOC);

    if ($users === []){return false;}

    foreach ($users as $user){
        if (($user['username'] === $id || $user['email'] === $id) && password_verify($pw, $user['password'])){
            return true;
        }
    }
}

function add_user(string $username, string $email, string $password){
    $bdd = new BDD();
    $add_user = $bdd->get_bdd()->prepare("INSERT INTO users (username, email, `password`) VALUES (?, ?, ?)");
    $add_user->execute([$username, $email, password_hash($password, PASSWORD_BCRYPT)]);
}

function user_exists(string $username){
    $bdd = new BDD();
    $search = $bdd->get_bdd()->prepare("SELECT username FROM users WHERE username = ?");
    $search->execute([$username]);
    $user = $search->fetchAll(PDO::FETCH_ASSOC);

    if ($user != []){return true;}
    return false;
}