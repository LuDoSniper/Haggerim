<?php

    require_once 'bdd.php';

    function add_joining_request(string $id){
        $bdd = new BDD();
        $select = $bdd->get_bdd()->prepare("SELECT ID FROM joining_request WHERE user_ID = ?");
        $select->execute([$id]);
        $users = $select->fetchAll(PDO::FETCH_ASSOC);

        if ($users === []){
            $insert = $bdd->get_bdd()->prepare("INSERT INTO joining_request (user_ID) VALUES (?)");
            $insert->execute([$id]);
        }
    }

    function is_member(string $id){
        $bdd = new BDD();
        $select = $bdd->get_bdd()->prepare("SELECT state_ID FROM joining_request WHERE user_ID = ?");
        $select->execute([$id]);
        $state = $select->fetchAll(PDO::FETCH_ASSOC);
 
        return $state[0]['state_ID'] === 2;
    }