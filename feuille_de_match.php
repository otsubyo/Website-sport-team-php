<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <title>Gestion des matchs</title>
    <link rel="stylesheet" href="styles/nav-bar-footer.css">
    <link rel="stylesheet" href="styles/style-gest-matchs.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="shortcut icon" type="image/jpg" href="data/basketball-hoop.png" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li>
                <a href="#">Gestion</a>
                <ul class="sub-menu">
                <li><a href="gestion_joueurs.php">Gestion des joueurs</a></li>
                 <li><a href="gestion_matchs.php">Gestion des matchs</a></li>
                </ul>
                </li>
                <li><a href="feuille_de_match.php">Feuille de match</a></li>
                <li><a href="statistiques.php">Statistiques</a></li>   
                <li><a href="connexion.php?d=1">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h3>Feuille de match</h3>
        <form method="post" action="feuille_saisi.php">
    <div class="row mb-3">
        <div class="col">
        Domicile ou extérieur<select class="form-control form-control-sm" name="domicile">
            <option>Domicile</option>
            <option>Extérieur</option>
        </select>
        </div>
        <div class="col">
            Nom équipe adverse<input type="text" class="form-control form-control-sm" name="equipeAdverse" value="" placeholder="" required><br>                
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            Date du match<input type="date" class="form-control form-control-sm" name="dateM" value="" placeholder="" required><br>                
        </div>
        <div class="col">
<body>
<html>



<style>
   body {
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
}

header {
    background-color: #2b3d58;
    color: #fff;
    padding: 10px 20px;
}

header nav {
    display: flex;
    justify-content: space-between;
}

header nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

header nav ul li {
    margin-right: 10px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
}

header nav ul li a:hover {
    color: #ccc;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

h3 {
    text-align: center;
    margin-top: 50px;
    margin-bottom: 30px;
}

form {
    width: 50%;
    margin: 0 auto;
}

form .row {
    display: flex;
    justify-content: space-between;
}

form .row .col {
    width: 45%;
}

form .row .col input[type=text],
form .row .col input[type=date],
form .row .col select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.sub-menu {
    display: none;
}

li:hover .sub-menu {
    display: block;
    position: absolute;
    background-color: #2b3d58;
    min-width: 100px;
}

</style>
