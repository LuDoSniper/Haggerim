<?php

    require_once "../ressources/login_fonctions.php";
    require_once "../ressources/fonctions.php";

    session_start();

    if (!isset($_SESSION['user'])){
        header("Location: ../index.php");
    }

    if (!is_member($_SESSION['user']['ID'])){
        $member = "not-member";
        $state = "disabled";
    } else {
        $member = "";
        $state = "enabled";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haggerim</title>
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div id="background">
        <div class="blur"></div>
    </div>
    
    <header>
        <img src="../imgs/Haggerim_logo.png" alt="Le logo d'Haggerim">
        <span id="profil"><img src="../imgs/user_modif.png" alt="Tête de Steeve dans Minecraft"></span>
    </header>

    <div id="menu">
        <div class="content">
            <div class="header">
                <div id="close"><span class="material-symbols-outlined">close</span></div>
            </div>
            <div class="body">
                <?php if ($_SESSION['user']['moderator_level'] > 0) { ?>
                <a href="moderation.php"><div><span class="modo">Espace modérateur</span></div></a>
                <?php } ?>
                <a href="home.php"><div><span>Page principale</span></div></a>
                <a href="profile.php"><div><span>Mon profil</span></div></a>
            </div>
        </div>
    </div>

    <div id="body">
        <div class="main-title">
            <div class="noir"></div>
            <h1>Bienvenue dans le monde d'<span>Haggerim</span> !</h1>
        </div>

        <div id="features">
            <form action="join.php" method="post">
                <button class="info-bulle member" <?php if ($member === "") {echo 'disabled';} ?>>Rejoindre Haggerim</button>
            </form>
            <button class="info-bulle <?= $member ?>" <?= $state ?>>Gestion des royaumes</button>
            <button class="info-bulle dev" disabled>Hall of Haggerim's beauties</button>
            <button class="info-bulle <?= $member ?>" <?= $state ?>>Signaler un joueur</button>
        </div>

        <div id="info-bulle"><span>Ceci est une info bulle</span></div>
    </div>

    <script src="../scripts/home.js"></script>
</body>
</html>