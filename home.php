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
</head>
<body>
    
</body>
</html>