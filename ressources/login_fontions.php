<?php

require_once "ressources/bdd.php";

function try_login(string $id, string $pw){
    $bdd = new BDD();
    $search = $bdd->get_bdd()->prepare("SELECT ID FROM users WHERE username = ? OR email = ?");
    $search->execute([$id, $id]);
    $users = $search->fetchAll(PDO::FETCH_ASSOC);
}