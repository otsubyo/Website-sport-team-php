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

$req = $linkpdo->query('SELECT * FROM partie');
$req->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestion des matchs</title>
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
                <a href="">Gestion des matchs</a>
                <a href="gestion_joueurs.php">Gestion des joueurs</a>
            </div>
        </div>
        <a href="feuille_de_match.php">Feuille de match</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="connexion.php?d=1">Deconnexion</a>
    </div>
    <div class="match_view">
        <table>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Equipe adverse</th>
                <th>Lieu</th>
                <th>Resultat</th>
            </tr>
            <?php
            while ($data = $req->fetch()) {
                $id1 = $data['date_match'];
                $id2 = $data['heure'];
                echo '<tr>
                            <td>' . $data['date_match'] . '</td>
                            <td>' . $data['heure'] . '</td>
                            <td>' . $data['nom_equipe_adverse'] . '</td>
                            <td>' . $data['lieu_de_rencontre'] . '</td>
                            <td>' . $data['resultat_match'] . '</td>
                            <td><a href="gestion_match.php?date_match=' . $id1 . '&heure=' . $id2 . '">Modifier</a></td>
                            <td><a href="gestion_match.php?date_match=' . $id1 . '&heure=' . $id2 . '">Supprimer</a></td>
                        </tr>';
            }
            //Fermeture du curseur d'analyse des résultats
            $req->closeCursor();
            ?>
        </table>
    </div>


</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap');

    body {
        margin: 0;
        padding: 0;
        background: #2b3d58;
        height: 92.7vh;
        font-family: 'Noto Sans TC', sans-serif;
    }

    /* Table*/
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        font-weight: bold;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #7c8594;
        color: #fff;
    }

    td a{
        color: #000;
        text-decoration: none;
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
</style>