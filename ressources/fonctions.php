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

        if (!isset($state[0]['state_ID'])){
            return false;
        }
        return $state[0]['state_ID'] === 2;
    }

    function get_joining_requests(){
        $bdd = new BDD();
        $select = $bdd->get_bdd()->prepare(("SELECT joining_request.ID as ID, users.username as username, users.email as email, joining_request.date as `date`, joining_request.state_ID as `state` FROM joining_request INNER JOIN users ON users.ID = joining_request.user_ID"));
        $select->execute([]);
        $states = $select->fetchAll((PDO::FETCH_ASSOC));

        return $states;
    }

    function datetime_to_displayFormat(string $chaine){
        $date = explode("-", explode(" ", $chaine)[0]);
        $heure = explode(":", explode(" ", $chaine)[1]);

        return $date[2].'/'.$date[1].'/'.$date[0].' '.$heure[0].':'.$heure[1];
    }

    function answer_joining_requests(string $state, string $id){
        if ($state === "Accepter"){
            $state = 2;
        } else {
            $state = 3;
        }

        $bdd = new BDD();
        $update = $bdd->get_bdd()->prepare("UPDATE joining_request SET state_ID = ? WHERE ID = ?");
        $update->execute([$state, $id]);
    }

    function get_members(){
        $bdd = new BDD();
        $select = $bdd->get_bdd()->prepare("SELECT users.username as username, users.email as email FROM joining_request INNER JOIN users ON users.ID = joining_request.user_ID WHERE state_ID = 2");
        $select->execute([]);
        $members = $select->fetchAll(PDO::FETCH_ASSOC);

        return $members;
    }

    function get_refused_members(){
        $bdd = new BDD();
        $select = $bdd->get_bdd()->prepare("SELECT users.username as username, users.email as email FROM joining_request INNER JOIN users ON users.ID = joining_request.user_ID WHERE state_ID = 3");
        $select->execute([]);
        $members = $select->fetchAll(PDO::FETCH_ASSOC);

        return $members;
    }

    function change_username(int $id, string $username){
        $bdd = new BDD();
        $update = $bdd->get_bdd()->prepare("UPDATE users SET username = ? WHERE ID = ?");
        $update->execute([$username, $id]);
    }

    function change_email(int $id, string $email){
        $bdd = new BDD();
        $update = $bdd->get_bdd()->prepare("UPDATE users SET email = ? WHERE ID = ?");
        $update->execute([$email, $id]);
    }

    function change_password(int $id, string $password){
        $bdd = new BDD();
        $update = $bdd->get_bdd()->prepare("UPDATE users SET `password` = ? WHERE ID = ?");
        $update->execute([$password, $id]);
    }