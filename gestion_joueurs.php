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
    <link rel="stylesheet" href="styles/nav-bar-footer.css">
    <link rel="stylesheet" href="styles/style-gest-joueurs.css">
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
    <h2>Gestion des joueurs</h2>
    <div class="liste-joueurs">
        <div class="joueur">
            <img src="data/user-icon.jpg" alt="Photo Joueur">
            <div class="info-joueur">
                <p>N° de licence : </p>
                <p>Nom :</p>
                <p>Prénom :</p>
                <p>Taille :</p>
                <p>Poids :</p>
                <p>Poste :</p>
                <p>Statut :</p>
            </div>
            <div class="edition">
                <a class="linka" href="add_player.php">Ajouter un joueur</a>
            </div>
        </div>
        <?php
        while ($data = $req->fetch()) {
            $id_contact = $data['numero_licence'];
            echo '<div class="joueur">';
                echo '<img src="'.'players/'. $data['photo'] . '" alt="Photo Joueur">';
                echo '<div class="info-joueur">';
                    echo '<p>N° de licence : ' . $data['numero_licence'] . '</p>';
                    echo '<p>Nom : ' . $data['nom'] . '</p>';
                    echo '<p>Prénom : ' . $data['prenom'] . '</p>';
                    echo '<p>Taille : ' . $data['taille'] . ' cm' . '</p>';
                    echo '<p>Poids : ' . $data['poids'] . ' kg' . '</p>';
                    echo '<p>Poste : ' . $data['poste'] . '</p>';
                    echo '<p>Statut : ' . $data['statut'] . '</p>';
                echo '</div>';
                echo '<div class="edition">';
                    echo '<a class="link1" href="edition_joueur.php">Modifier</a>';
                    echo '<a class="link2" href="delete_player.php">Supprimer</a>';
                echo '</div>';
            echo '</div>';
        }
        //Fermeture du curseur d'analyse des résultats
        $req->closeCursor();
        ?>
    </div>
</body>