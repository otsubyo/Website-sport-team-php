<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit();
}
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";

try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $linkpdo->query('SELECT * FROM joueur');
if ($req->execute() == false) {
    die('Erreur : ' . $req->errorInfo()[2]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestion des joueurs</title>
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
                <a href="">Gestion des joueurs</a>
            </div>
        </div>
        <a href="feuille_de_match.php">Feuille de match</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="connexion.php?d=1">Deconnexion</a>
    </div>
    <!-- Fin du menu de navigation -->
    <!-- Affichage des joueurs -->
    <div class="new_player">
            <div class="btn_div">
                <a class="btn btn-primary" href="add_player.php">Ajouter un joueur</a>
            </div>
        </div>
    <div class="conteneur">
        <?php
        while ($data = $req->fetch()) {
            $id_contact = $data['numero_licence'];
            echo '<div class="card">';
            echo '<img src="'.'players/'. $data['photo'] . '" alt="Photo Joueur" style="width:100%">';
            echo '<div class="container">';
            echo '<h4><b>N° de licence : ' . $data['numero_licence'] . '</b></h4>';
            echo '<p>Nom : ' . $data['nom'] . '</p>';
            echo '<p>Prénom : ' . $data['prenom'] . '</p>';
            echo '<p>Taille : ' . $data['taille'] . ' cm' . '</p>';
            echo '<p>Poids : ' . $data['poids'] . ' kg' . '</p>';
            echo '<p>Poste : ' . $data['poste'] . '</p>';
            echo '<p>Statut : ' . $data['statut'] . '</p>';
            echo '</div>';
            echo '<div class="btn_div">';
            echo '<button type="button" class="btn1">Modifier</button>';
            echo '<button type="button" class="btn2">Supprimer</button>';
            echo '</div>';
            echo '</div>';
        }
        //Fermeture du curseur d'analyse des résultats
        $req->closeCursor();
        ?>
    </div>
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