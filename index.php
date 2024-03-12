<?php
    require_once 'ressources/bdd.php';
    require_once 'ressources/login_fonctions.php';

    session_start();

    $check = false;
    if (isset($_POST['id']) && isset($_POST['pw']) && !isset($_POST['create'])){
        $check = true;

        if (try_login($_POST['id'], $_POST['pw'])){
            header("Location: test.php");
        }
    }

    $login = "sign in";
    if (isset($_POST['create'])){$login = "sign up";}

    if (!isset($_POST['home']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        if ($_POST['username'] === "" || $_POST['email'] === "" || $_POST['password'] === ""){
            $message = "Tous les champs ne sont pas valides";
            $check = true;
            if (!isset($_POST['home'])){
                $login = "sign up";
            }
        } else {
            if (user_exists($_POST['username'])){
                $message = "Cet utilisateur existe déjà";
                $check = true;
                $login = "sign up";
            } else {
                add_user($_POST['username'], $_POST['email'], $_POST['password']);
            }
        }
    }
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
        <?php if ($login === "sign in"){?>
        <h1>Se connecter</h1>
        <p id="message"><?php if ($check){echo "Identifiant ou mot de passe incorrect";}?></p>
        <form action="index.php" method="post">
            <div class="inputs">
                <input type="text" name="id" placeholder="Email ou identifiant">
                <input type="password" name="pw" placeholder="Mot de passe">
            </div>
            <div class="buttons">
                <button>Se connecter</button>
                <button name="create">Créer un compte</button>
            </div>
        </form>
        <?php } elseif ($login === "sign up"){?>
        <h1>S'inscrire</h1>
        <p id="message"><?php if ($check){echo $message;}?></p>
        <form action="index.php" method="post">
            <div class="inputs">
                <input type="text" name="username" placeholder="Pseudo Minecraft">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <div class="buttons">
                <button>Créer un compte</button>
                <button name="home">Retour</button>
            </div>
        </form>
        <?php }?>
    </div>
</body>
</html>