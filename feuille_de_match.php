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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feuille de match</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styleacc.css"/>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="accueil.php"><img src="img/voley.png">VolleyClub</a></li>
                <li><a href="inscrit.php">Inscription joueur</a></li>
                <li><a href="feuille.php">Feuille de match</a></li>
                <li><a href="composition.php">Composition match</a></li>
                <li><a href="stats.php">Statistique</a></li>   
                <li><a href="connexion.php">Déconnexion</a></li>
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
    background-color: #262626;
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
</style>