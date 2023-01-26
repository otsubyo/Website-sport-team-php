<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit();
}

if (isset($_POST['valider'])){
    $server = "localhost";
    $db = "sport-team-management";
    $login = "root";
    $mdp = "9dfe351b";
    try {
        $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $date_match = $_POST['date_match'];
    $heure = $_POST['heure'];
    $nom_equipe_adverse = $_POST['nom_equipe_adverse'];
    $lieu_de_rencontre = $_POST['lieu_de_rencontre'];
    $resultat = $_POST['resultat_match'];
    $req = $linkpdo->prepare('INSERT INTO partie VALUES(:date_match, :heure, :nom_equipe_adverse, :lieu_de_rencontre, :resultat)');

    $res = $req->execute(array(
        'date_match' => $date_match,
        'heure' => $heure,
        'nom_equipe_adverse' => $nom_equipe_adverse,
        'lieu_de_rencontre' => $lieu_de_rencontre,
        'resultat' => $resultat
    ));
    if (!$res) {
        echo "Erreur lors de l'ajout du match";
    } else {
        header('Location: gestion_match.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un match</title>
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
    <h2>Ajouter un match</h2>
    <div class="match_view">
        <form action="" method="post">
            <label for="date_match">Date du match</label>
            <input type="date" name="date_match" id="date_match" required>
            <label for="heure">Heure du match</label>
            <input type="time" name="heure" id="heure" required>
            <label for="nom_equipe_adverse">Nom de l'équipe adverse</label>
            <input type="text" name="nom_equipe_adverse" id="nom_equipe_adverse" required>
            <label for="lieu_de_rencontre">Lieu de rencontre</label>
            <input type="text" name="lieu_de_rencontre" id="lieu_de_rencontre" required>
            <label for="resultat_match">Résultat du match</label>
            <input type="text" name="resultat_match" id="resultat_match" required>
            <input type="submit" name="valider" value="Ajouter">
        </form>
</body>
</html>