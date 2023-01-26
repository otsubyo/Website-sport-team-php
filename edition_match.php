<?php
$heure = $_GET['heure'];
$date_match = $_GET['date_match'];
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";
try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $linkpdo->prepare('SELECT * FROM partie WHERE date_match = :date_match AND heure = :heure');
$req->execute(array(
    'date_match' => $date_match,
    'heure' => $heure
));
$donnees = $req->fetch();
$nom_equipe_adverse = $donnees['nom_equipe_adverse'];
$lieu = $donnees['lieu_de_rencontre'];
$resultat = $donnees['resultat_match'];

if (isset($_POST['valider'])){
    $req = $linkpdo->prepare('UPDATE partie SET date_match = :date_match, heure = :heure, nom_equipe_adverse = :nom_equipe_adverse, lieu_de_rencontre = :lieu_de_rencontre, resultat_match = :resultat_match WHERE date_match = :date_match_last AND heure = :heure_match_last');
    $res = $req->execute(array(
        'date_match' => $_POST['date_match'],
        'heure' => $_POST['heure'],
        'nom_equipe_adverse' => $_POST['nom_equipe_adverse'],
        'lieu_de_rencontre' => $_POST['lieu_de_rencontre'],
        'resultat_match' => $_POST['resultat_match'],
        'date_match_last' => $date_match,
        'heure_match_last' => $heure
    ));
    if (!$res) {
        echo "Erreur lors de la modification du match";
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
    <link rel="stylesheet" href="styles/style-ajout-match.css">
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
<h2>Modifier un match</h2>
<div class="match_view">
    <form action="" method="post">
        <label for="date_match">Date du match</label>
        <input type="date" name="date_match" id="date_match" value="<?= $date_match ?>">
        <label for="heure">Heure du match</label>
        <input type="time" name="heure" id="heure" value="<?= $heure ?>">
        <label for="nom_equipe_adverse">Nom de l'équipe adverse</label>
        <input type="text" name="nom_equipe_adverse" id="nom_equipe_adverse" value="<?= $nom_equipe_adverse ?>">
        <label for="lieu_de_rencontre">Lieu de rencontre</label>
        <input type="text" name="lieu_de_rencontre" id="lieu_de_rencontre" value="<?= $lieu ?>">
        <label for="resultat_match">Résultat du match</label>
        <input type="text" name="resultat_match" id="resultat_match" value="<?= $resultat ?>">
        <input type="submit" name="valider" value="Modifier">
    </form>
</body>
</html>