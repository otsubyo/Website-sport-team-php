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
                 <li><a href="gestion_match.php">Gestion des matchs</a></li>
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
        <div class="col">
            Lieu<input type="text" class="form-control form-control-sm" name="equipeAdverse" value="" placeholder="" required><br>                
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            Date du match<input type="date" class="form-control form-control-sm" name="dateM" value="" placeholder="" required><br>                
        </div>
        <div class="col">
<body>


<!-- 
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sélection</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Taille</th>
            <th>Poids</th>
            <th>Poste préféré</th>
            <th>Commentaires</th>
            <th>Evaluations de l'entraîneur</th>
        </tr>
    </thead>
    <tbody>
        <?php
            /* // Récupération des joueurs depuis la base de données
            $players = getPlayers();
            foreach ($players as $player) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="selected_players[]" value="' . $player['id'] . '"></td>';
                echo '<td><img src="' . $player['photo'] . '" alt="Photo du joueur"></td>';
                echo '<td>' . $player['name'] . '</td>';
                echo '<td>' . $player['height'] . ' cm</td>';
                echo '<td>' . $player['weight'] . ' kg</td>';
                echo '<td>' . $player['preferred_position'] . '</td>';
                echo '<td>' . $player['comments'] . '</td>';
                echo '<td>' . $player['coach_evaluation'] . '</td>';
                echo '</tr>'; 
            }
        */?>
        
    </tbody>
</table>

-->
        
<html>  
<style>


body {
font-family: Arial, sans-serif;
background-color: #f2f2f2;
}

header {
background-color: #2b3d58;
color: white;
padding: 1rem;
}

nav {
display: flex;
justify-content: space-between;
align-items: center;
}

nav ul {
display: flex;
list-style: none;
margin: 0;
padding: 0;
}

nav ul li {
margin: 0 1rem;
}

nav ul li a {
color: white;
text-decoration: none;
}

nav ul li a:hover {
color: #f2f2f2;
background-color: #2b3d58;
}

nav ul li ul.sub-menu {
display: none;
position: absolute;
background-color: #2b3d58;
padding: 1rem;
border: 1px solid #ccc;
}

nav ul li:hover ul.sub-menu {
display: block;
}

.container {
width: 80%;
margin: 2rem auto;
padding: 2rem;
background-color: white;
border-radius: 1rem;
}

h3 {
text-align: center;
margin-bottom: 2rem;
}

form {
display: flex;
flex-wrap: wrap;
}

form div {
flex: 1;
margin: 0.5rem;
}

form input[type="text"],
form select,
form input[type="date"] {
width: 100%;
padding: 0.5rem;
border-radius: 0.25rem;
border: 1px solid #ccc;
box-sizing: border-box;
}

form input[type="submit"] {
background-color: #4CAF50;
color: white;
padding: 0.5rem 1rem;
border: none;
border-radius: 0.25rem;
cursor: pointer;
}

form input[type="submit"]:hover {
background-color: #2b3d58;
}

</style>





