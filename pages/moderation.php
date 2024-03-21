<?php
    require_once '../ressources/login_fonctions.php';
    require_once '../ressources/fonctions.php';

    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['moderator_level'] < 1){
        header("Location: ../index.php");
    }

    $requests_origin = get_joining_requests();
    $requests = [];
    foreach ($requests_origin as $request){
        $request_array['ID'] = $request['ID'];
        $request_array['username'] = $request['username'];
        $request_array['email'] = $request['email'];
        $request_array['date'] = datetime_to_displayFormat($request['date']);
        $request_array['state'] = $request['state'];

        $requests[] = $request_array;
    }

    if (isset($_POST['state']) && isset($_POST['user_ID'])){
        answer_joining_requests($_POST['state'], $_POST['user_ID']);
        header("Location: moderation.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modération</title>
    <link rel="stylesheet" href="../styles/moderation.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div id="overlay"></div>

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
        <div class="main-title">
            <div class="noir"></div>
            <h1>Espace de modération d'<span>Haggerim</span></h1>
        </div>

        <div class="quartz" id="joining-requests">
            <h2>Demandes d'adhésion</h2>
            <table>
                <thead>
                    <tr>
                        <td>Nom d'utilisateur</td>
                        <td>Adresse mail</td>
                        <td>Date de requète</td>
                        <td>Réponse</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($requests as $request){
                            if ($request['state'] != 1){ continue; }
                            
                            echo '
                            <tr><td>'.$request['username'].'</td><td>'.$request['email'].'</td><td>'.$request['date'].'</td>
                            <td><div class="button">
                            <div class="menu">
                                <span class="accept">Accepter</span>
                                <span class="refuse">Refuser</span>
                            </div>
                            <div class="left">
                                <span>Accepter</span>
                            </div>
                            <div class="right">
                                <span>V</span>
                            </div>
                            <form action="moderation.php" method="post">
                            <input type="hidden" name="state" value="Accepter">
                            <input type="hidden" name="user_ID" value="'.$request['ID'].'">
                            </div></td></form>';
                        } ?>
                </tbody>
            </table>
        </div>

        <div class="quartz">
            <h2>Membres actuels</h2>
            <table>
                <thead>
                    <tr>
                        <td>Nom d'utilisateur</td>
                        <td>Adresse mail</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $members = get_members();
                        foreach ($members as $member){
                            echo '
                            <tr>
                                <td>'.$member['username'].'</td>
                                <td>'.$member['email'].'</td>
                            </tr>';
                        } ?>
                </tbody>
            </table>
        </div>

        <div class="quartz">
            <h2>Membres Refusés</h2>
            <table>
                <thead>
                    <tr>
                        <td>Nom d'utilisateur</td>
                        <td>Adresse mail</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $members = get_refused_members();
                        foreach ($members as $member){
                            echo '
                            <tr>
                            <td>'.$member['username'].'</td>
                            <td>'.$member['email'].'</td>
                            </tr>';
                        } ?>
                </tbody>
            </table>
        </div>
    </div>
        
    <script src="../scripts/moderation.js"></script>
</body>
</html>