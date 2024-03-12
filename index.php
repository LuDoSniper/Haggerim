<?php
    require_once 'ressources/bdd.php';
    require_once 'ressources/login_fonctions.php';

    session_start();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haggerim Connexion</title>
    <link rel="stylesheet" href="style-index.css">
</head>
<body>
    <div id="background">
        <div class="blur"></div>
    </div>
    
    <header>
        <img src="imgs/Haggerim_logo.png" alt="Le logo d'Haggerim">
    </header>

    <div id="login_container">
        <h1>Se connecter</h1>
        <p id="message">Identifiant ou mot de passe incorrect</p>
        <form action="index.php" method="post">
            <div class="inputs">
                <input type="text" name="id" placeholder="Email ou identifiant">
                <input type="password" name="pw" placeholder="Mot de passe">
            </div>
            <div class="buttons">
                <button>Se connecter</button>
                <button>Créer un compte</button>
            </div>
        </form>
    </div>
</body>
</html>