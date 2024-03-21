<?php
    require_once "../ressources/login_fonctions.php";
    require_once "../ressources/fonctions.php";

    session_start();

    if (!isset($_SESSION['user'])){
        header("Location: ../index.php");
    }

    if (isset($_POST['agree'])){
        if ($_POST['agree'] === "on"){
            add_joining_request($_SESSION['user']['ID']);
            header("Location: home.php");
        }
    } elseif (isset($_POST['validate'])){
        $tricheur = true;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haggerim</title>
    <link rel="stylesheet" href="../styles/join.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div id="background">
        <div class="blur"></div>
    </div>
    
    <header>
        <img src="../imgs/Haggerim_logo.png" alt="Le logo d'Haggerim" onclick="changePage()">
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
                <a href="../index.php?logout"><div><span>Se déconnecter</span></div></a>
            </div>
        </div>
    </div>

    <div id="body">
        <?php if (isset($tricheur)){ ?><small class="em">Erreur lors de la validation du règlement.</small><?php } ?>
        
        <div class="main-title">
            <div class="noir"></div>
            <h1>Rejoindre le monde d'<span>Haggerim</span></h1>
        </div>

        <div id="rules">
            <div class="noir"></div>
            <ul>
                <li>Toutes constructions, qu'elles soient sous terre ou non, toutes fermes, automatisations, systèmes de redstone, etc, <span class="bold">doivent</span> être dans un esprit <span class="em2">médiéval fantastique</span>.</li>
                <li>Le monde environnant <span class="bold">doit</span> être respecté et rester visuellement <span class="em">naturel</span> (hors constructions).</li>
                <li>Toutes structures appartenant à un autre joueur, <span class="bold">doit</span> rester <span class="em">tel quel</span> sauf mention contraire.</li>
                <li>Toutes revendications de <span class="em">délimitation</span>, <span class="em">création</span>, <span class="em">suppression</span> de <span class="light_blue">royaume</span>, ou de <span class="light_blue">zone</span>, <span class="bold">doivent</span> passer au moins par le site officiel d'<span class="light_blue">Haggerim</span>.</li>
                <li>Tous les chats envoyés <span class="bold">doivent</span> rester <span class="em">respectueux</span> et <span class="em">consentis</span> par le destinataire.</li>
                <li>Toutes nuits passées dans une zone temporaires (lors d'une exploration par exemple) doivent être accompagnées de la construction d'un petit <span class="em">campement</span> devant contenir un feu de camp. Ce campement <span class="bold">doit</Span> rester sur place ainsi que le ou les lits en question.</li>
            </ul>
        </div>

        <small>Tout non respect du règlement sera sanctionné et pourra entrainer un bannissement aussi bien temporaire que définitif.</small>
        <form action="join.php" method="post">
            <div>
                <input type="checkbox" name="agree" id="agree" required>
                <label for="agree">J'ai lu et j'accepte le règlement</label>
            </div>
            <button name="validate">
                <img src="../imgs/button.png" alt="">
                <span>Rejoindre l'aventure</span>
            </button>
        </form>
    </div>

    <script src="../scripts/join.js"></script>
</body>
</html>