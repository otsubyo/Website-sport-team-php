<?php

if(isset($_POST['submit'])){
    // Récupération des données du formulaire
    $numero_licence = $_POST['numero_licence'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $poste = $_POST['poste'];
    $statut = $_POST['statut'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '9dfe351b', 'sport-team-management');

    // Préparation de la requête d'insertion
    $query = "INSERT INTO joueurs (numero_licence, nom, prenom, taille, poids, poste, statut) VALUES ('$nom', '$prenom', '$taille', '$poids', '$poste', '$statut')";

    // Exécution de la requête
    if($conn->query($query) === TRUE){
        echo "Joueur ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
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
        <a href="connexion.php?d=1">Déconnexion</a>

<form method="post" action="">
    <label>N° de licence :</label>
    <input type="text" name="numero_licence" required>
    <br>
    <label>Nom :</label>
    <input type="text" name="nom" required>
    <br>
    <label>Prénom :</label>
    <input type="text" name="prenom" required>
    <br>
    <label>Taille :</label>
    <input type="text" name="taille" required>
    <br>
    <label>Poids :</label>
    <input type="text" name="poids" required>
    <br>
    <label>Poste :</label>
    <input type="text" name="poste" required>
    <br>
    <label>Statut :</label>
    <input type="text" name="statut" required>
    <br>
    <input type="submit" name="submit" value="Ajouter joueur">
</form>
</body>

<style>
    @import url('https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap');

    body {
        margin: 0;
        padding: 0;
        background: white;
        height: 92.7vh;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .conteneur {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }

    .new_player{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }

    .new_player .btn_div{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 10%;
    }

    .new_player .btn_div .btn{
        cursor: pointer;
        background-color: white;
        color: #2B3D5B;
        border: solid 1px #2B3D5B;
        width: auto;
        max-height: 10%;
        padding: 10px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .conteneur .card {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 10px;
        margin: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 20%;
        height: auto;
        background-color: white;
        border: #2b3d58 solid 1px;
        border-radius: 3px;
    }

    .conteneur .card img {
        border-radius: 50%;
        border: solid 4px #2b3d58;
        max-width: 50%;
        height: 50%;
    }

    .conteneur .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .conteneur .container {
        display: block;
        margin-top: 9px;
        width: auto;
    }

    .conteneur .container h4 {
        font-size: 20px;
        text-align: center;
        color: #2b3d58;
    }

    /* The navigation menu */
    .barre_nav {
        overflow: hidden;
        background-color: #2b3d58;
        transition: 0.3s;
    }

    /* Navigation links */
    .barre_nav a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: 0.3s;
    }

    /* The subnavigation menu */
    .subnav {
        float: left;
        overflow: hidden;
    }

    /* Subnav button */
    .subnav .subnavbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    /* Add a red background color to navigation links on hover */
    .barre_nav a:hover,
    .subnav:hover .subnavbtn {
        background-color: #15253f;
    }

    /* Style the subnav content - positioned absolute */
    .subnav-content {
        display: none;
        position: absolute;
        left: 0;
        background-color: #15253f;
        width: 100%;
        z-index: 1;
    }

    /* Style the subnav links */
    .subnav-content a {
        float: left;
        color: white;
        text-decoration: none;
    }

    /* Add a grey background color on hover */
    .subnav-content a:hover {
        background-color: #eee;
        color: black;
    }

    /* When you move the mouse over the subnav container, open the subnav content */
    .subnav:hover .subnav-content {
        display: block;
        z-index: 2;
    }

    .match_view {
        background-color: #fff;
        width: 100%;
        height: 100%;
    }

    .conteneur .card .btn_div {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 10%;
    }

    .conteneur .card .btn_div .btn1 {
        cursor: pointer;
        background-color: #2b3d58;
        width: auto;
        max-height: 10%;
        border: none;
        color: white;
        padding: 10px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .conteneur .card .btn_div .btn2 {
        cursor: pointer;
        background-color: red;
        width: auto;
        max-height: 10%;
        border: none;
        color: white;
        padding: 10px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>
