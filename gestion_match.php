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

if (isset($_GET['date_match']) && isset($_GET['heure']) && isset($_GET['btn'])) {
    $date_match = $_GET['date_match'];
    $heure = $_GET['heure'];
    $req = $linkpdo->prepare('DELETE FROM jouer WHERE date_match = :date_match AND heure = :heure');
    $req1 = $linkpdo->prepare('DELETE FROM partie WHERE date_match = :date_match AND heure = :heure');
    $req->execute(array(
        'date_match' => $date_match,
        'heure' => $heure
    ));
    $req1->execute(array(
        'date_match' => $date_match,
        'heure' => $heure
    ));
    header('Location: gestion_match.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestion des matchs</title>
    <link rel="stylesheet" href="styles/nav-bar-footer.css">
    <link rel="stylesheet" href="styles/style-gest-matchs.css">
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
    <h2>Gestion des matchs</h2>
    <div class="match_view">
        <table>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Équipe adverse</th>
                <th>Lieu</th>
                <th>Résultat</th>
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
                            <td><a href="edition_match.php?date_match=' . $id1 . '&heure=' . $id2 . '">Modifier</a></td>
                            <td><a href="gestion_match.php?date_match=' . $id1 . '&heure=' . $id2 . '.&btn=2'.'">Supprimer</a></td>
                        </tr>';
            }
            //Fermeture du curseur d'analyse des résultats
            $req->closeCursor();
            ?>
        </table>
    </div>
    <a href="ajout-match.php" class="add-match">Ajouter un match</a>


</body>