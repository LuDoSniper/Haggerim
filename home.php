<?php
    require_once "ressources/login_fonctions.php";
    require_once "ressources/fonctions.php";

    session_start();

    if (!isset($_SESSION['user'])){
        header("Location: index.php");
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
    <link rel="stylesheet" href="style-home.css">
</head>
<body>
    <div id="background">
        <div class="blur"></div>
    </div>
    
    <header>
        <img src="imgs/Haggerim_logo.png" alt="Le logo d'Haggerim">
        <span><img src="imgs/user_modif.png" alt="Tête de Steeve dans Minecraft"></span>
    </header>

    <div id="body">
        <div class="main-title">
            <div class="noir"></div>
            <h1>Bienvenue dans le monde d'<span>Haggerim</span> !</h1>
        </div>

        <div id="features">
            <form action="join.php" method="post"><button>Rejoindre Haggerim</button></form>
            <button class="info-bulle <?= $member ?>" <?= $state ?>>Gestion des royaumes</button>
            <button class="info-bulle dev" disabled>Hall of Haggerim's beauties</button>
            <button class="info-bulle <?= $member ?>" <?= $state ?>>Signaler un joueur</button>
        </div>

        <div id="info-bulle"><span>Ceci est une info bulle</span></div>
    </div>

    <script src="script-home.js"></script>
</body>
</html>