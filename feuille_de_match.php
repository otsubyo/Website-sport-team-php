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
@import url('https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap');

body {
    margin: 0;
    padding: 0;
    background: white;
    font-family: 'Noto Sans TC', sans-serif;
}

h2 {
    text-align: center;
    font-size: 1.5em;
    font-weight: bold;
    color: #2b3d58;
    margin: 0;
    padding: 1%;
    border-bottom: solid 2px #5b729a;
}

.liste-joueurs {
    display: grid;
    margin: 2px;
    grid-template-columns: repeat(4, 0.1fr);
    justify-content: center;
    grid-gap: 10px;
    padding: 3px;
}

.liste-joueurs p {
    font-size: .7em;
    font-weight: bold;
    margin: 10px;
    width: fit-content;
}

.liste-joueurs .joueur {
    border: 1px solid #5b729a;
    width: 200px;
}

.liste-joueurs .joueur .info-joueur{
    width: auto;
    border-top: solid 1px #5b729a;
}

.liste-joueurs .joueur img {
    width: 30%;
    margin: 5% 50% 0 35%;
    align-self: center;
    box-shadow: 0 0 6px rgba(0, 67, 189, 0.13);
    border-radius: 50%;
}

.liste-joueurs .joueur .edition {
    display: flex;
    flex-direction: row;
    width: auto;
    justify-content: center;
    align-items: center;
}

.liste-joueurs .joueur .edition a {
    text-decoration: none;
    color: #000;
    font-size: .7em;
    font-weight: bold;
    margin: 10px;
    width: fit-content;
}

.liste-joueurs .joueur .edition .link1 {
    background: #2b3d58;
    color: white;
    border-radius: 5px;
    padding: 5px;
}

.liste-joueurs .joueur .edition .link2 {
    background: #d04545;
    color: white;
    border-radius: 5px;
    padding: 5px;
}

.liste-joueurs .joueur .edition .linka {
    background: #118800;
    color: white;
    border-radius: 5px;
    padding: 5px;
}

