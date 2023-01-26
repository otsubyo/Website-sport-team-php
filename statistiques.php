<?php
// Paramètres de connexion à la base de données
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";
try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Requête pour compter le nombre total de matchs gagnés et perdus
$query = "SELECT COUNT(*) AS total_matches,
    SUM(CASE WHEN resultat_match = 'Victoire' THEN 1 ELSE 0 END) AS won,
    SUM(CASE WHEN resultat_match = 'Defaite' THEN 1 ELSE 0 END) AS lost
FROM partie";
$stmt = $linkpdo->query($query);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);  

// Calcul du pourcentage de matchs gagnés, perdus, et nuls
$won_percent = round(($stats['won'] / $stats['total_matches']) * 100);
$lost_percent = round(($stats['lost'] / $stats['total_matches']) * 100);

// Requête pour récupérer les informations des joueurs
$query =
"SELECT
    nom,
    prenom,
    joueur.statut as statut,
    poste,
    AVG(note) AS avg_eval,
    ROUND((SUM(CASE WHEN resultat_match = 'Victoire' THEN 1 ELSE 0 END) / COUNT(*)),2) * 100 AS won_percent
FROM jouer, joueur, partie WHERE jouer.numero_licence = joueur.numero_licence";
$stmt = $linkpdo->prepare($query);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Statistiques de l'équipe</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-bar-footer.css">
    <link rel="stylesheet" href="styles/styles-statistiques.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="shortcut icon" type="image/jpg" href="data/basketball-hoop.png"/>
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
<h2>Statistiques de l'équipe</h2>

<div class="container">
    <h3>Résumé des matchs</h3>
    <p>Nombre total de matchs : <?php echo $stats['total_matches']; ?></p>
    <p>Matchs gagnés : <?php echo $stats['won']; ?> (<?php echo $won_percent; ?>%)</p>
    <p>Matchs perdus : <?php echo $stats['lost']; ?> (<?php echo $lost_percent; ?>%)</p>
</div>
<div class="tableau">
    <h3>Tableau des joueurs</h3>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Statut actuel</th>
            <th>Poste préféré</th>
            <th>Sélections en tant que titulaire</th>
            <th>Sélections en tant que remplaçant</th>
            <th>Moyenne des évaluations de l'entraîneur</th>
            <th>Pourcentage de matchs gagnés</th>
        </tr>
        <?php
        while ($player = $stmt->fetch()) {
            echo '<tr>
                <td>' . $player['nom'] . '</td>
                <td>' . $player['prenom'] . '</td>
                <td>' . $player['statut'] . '</td>
                <td>' . $player['poste'] . '</td>
                <td>' . "vide" . '</td>
                <td>' . "vide" . '</td>
                <td>' . $player['avg_eval'] . '</td>
                <td>' . $player['won_percent'] .'%'. '</td>
                </tr>';
        }
        //Fermeture du curseur d'analyse des résultats
        $stmt->closeCursor();
        ?>
    </table>
<div>

</div>
</body>
</html>