<?php
    require_once "ressources/login_fonctions.php";

    session_start();

    if (!isset($_SESSION['user'])){
        header("Location: index.php");
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
            <button>Rejoindre Haggerim</button>
            <button>Gestion des royaumes</button>
            <button disabled>Hall of Haggerim's beauty</button>
            <button>Signaler un joueur</button>
        </div>
    </div>
</body>
</html>