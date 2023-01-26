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
    <title>Accueil</title>
    <link rel="stylesheet" href="styles/nav-bar-footer.css">
    <link rel="stylesheet" href="styles/style-accueil.css">
    <link rel="shortcut icon" type="image/jpg" href="data/basketball-hoop.png" />
</head>

<body>
    <!-- Menu de navigation -->
    <div class="barre_nav">
        <a href="">Accueil</a>
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
    </div>
    <div class="match_view">
        <h2>Résultats des matchs</h2>
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
                $id_contact = $data['date_match'];
                echo '<tr>
                            <td>' . $data['date_match'] . '</td>
                            <td>' . $data['heure'] . '</td>
                            <td>' . $data['nom_equipe_adverse'] . '</td>
                            <td>' . $data['lieu_de_rencontre'] . '</td>
                            <td>' . $data['resultat_match'] . '</td>
                        </tr>';
            }
            //Fermeture du curseur d'analyse des résultats
            $req->closeCursor();
            ?>
        </table>
    </div>
</body>

</html>