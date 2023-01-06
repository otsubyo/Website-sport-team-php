<?php



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un joueur</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="shortcut icon" type="image/jpg" href="data/basketball-hoop.png" />
</head>
<body>
    <!-- Menu de navigation -->
    <div class="barre_nav">
        <a href="accueil.php">Accueil</a>
        <div class="subnav">
            <button class="subnavbtn">Gestion <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="gestion_match.php">Gestion des matchs</a>
                <a href="gestion_joueurs.php">Gestion des joueurs</a>
            </div>
        </div>
        <a href="feuille_de_match.php">Feuille de match</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="connexion.php?d=1">Deconnexion</a>
    </div>
    <!-- Fin du menu de navigation -->
    <!-- Formulaire d'ajout d'un joueur -->
    <div class="new_player">
        <form action="add_player.php" method="post">
            <div class="form-group">
                <label for="numero_licence">N° de licence</label>
                <input type="text" class="form-control" id="numero_licence" name="numero_licence" placeholder="N° de licence">

                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">

                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">

                <label for="taille">Taille</label>
                <input type="text" class="form-control" id="taille" name="taille" placeholder="Taille">

                <label for="poids">Poids</label>
                <input type="text" class="form-control" id="poids" name="poids" placeholder="Poids">

                <label for="poste">Poste</label>
                <input type="text" class="form-control" id="poste" name="poste" placeholder="Poste">

                <label for="date_naissance">Date de naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="Date de naissance">
            </div>