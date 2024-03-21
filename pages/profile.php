<?php
    session_start();

    if (!isset($_SESSION['user'])){
        header("Location: ../index.php");
    }

    if (isset($_POST['change'])){
        $username1 = $_POST['username1'];
        $username2 = $_POST['username2'];
        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($username1 != "" || $username2 != ""){
            if ($username1 != $username2){
                $username_message = "<span class=\"error\">Les noms d'utilisateurs ne sont pas les mêmes !</span>";
            } else {
                $username_message = "<span class=\"succes\">Le nom d'utilisateur à bien été changé.</span>";
            }
        }

        if ($email1 != "" || $email2 != ""){
            if ($email1 != $email2){
                $email_message = "<span class=\"error\">Les adresses mail ne sont pas les mêmes !</span>";
            } else {
                $email_message = "<span class=\"succes\">L'addresse mail à bien été changé.</span>";
            }
        }

        if ($password1 != "" || $password2 != ""){
            if ($password1 != $password2){
                $password_message = "<span class=\"error\">Les mots de passes ne sont pas les mêmes !</span>";
            } else {
                $password_message = "<span class=\"succes\">Le mot de passe à bien été changé.</span>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
    <link rel="stylesheet" href="../styles/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div id="background">
        <div class="blur"></div>
    </div>
    
    <header>
        <img src="../imgs/Haggerim_logo.png" alt="Le logo d'Haggerim" id="haggerim">
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
        <div id="infos-container">
            <form action="profile.php" method="post">
                <h1>Mon profil</h1>
                <?php if (isset($username_message)) {echo $username_message;} ?>
                <?php if (isset($email_message)) {echo $email_message;} ?>
                <?php if (isset($password_message)) {echo $password_message;} ?>
                <div id="username">
                    <h2>Identifiant :</h2>
                    <input type="text" name="username1" placeholder="Pseudo Minecraft">
                    <input type="text" name="username2" placeholder="Répéter le pseudo Minecraft">
                </div>
                <div id="email">
                    <h2>Email :</h2>
                    <input type="text" name="email1" placeholder="Email">
                    <input type="text" name="email2" placeholder="Répéter l'email">
                </div>
                <div id="password">
                    <h2>Mot de passe :</h2>
                    <input type="password" name="password1" placeholder="Mot de passe">
                    <input type="password" name="password2" placeholder="Répéter le mot de passe">
                </div>
                <button id="change" name="change">
                    <img src="../imgs/button.png" alt="Bouton Minecraft">
                    <span>Changer mes informations</span>
                </button>
            </form>
        </div>
    </div>

    <script src="../scripts/profile.js"></script>
</body>
</html>