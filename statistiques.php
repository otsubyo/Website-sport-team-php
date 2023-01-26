<?php
// Paramètres de connexion à la base de données
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";

// Connexion à la base de données
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
$query = 'SELECT COUNT(*) AS total_matches,
SUM(CASE WHEN resultat_match = "Victoire" THEN 1 ELSE 0 END) AS won,
SUM(CASE WHEN resultat_match = "Défaite" THEN 1 ELSE 0 END) AS lost
FROM partie';
$stmt = $linkpdo->query($query);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);  

// Calcul du pourcentage de matchs gagnés, perdus, et nuls
$won_percent = round(($stats['won'] / $stats['total_matches']) * 100);
$lost_percent = round(($stats['lost'] / $stats['total_matches']) * 100);

// Requête pour récupérer les informations des joueurs
$query = 'SELECT jouer.*,
//SUM(CASE WHEN statut = "Actif" THEN 1 ELSE 0 END) AS total_titular,
SUM(CASE WHEN titulaire = 0 THEN 1 ELSE 0 END) AS total_substitute,
AVG(note) AS avg_eval,
SUM(CASE WHEN resultat_match = "Victoire" THEN 1 ELSE 0 END) / COUNT(*) * 100 AS won_percent
FROM jouer
LEFT JOIN match_joueur ON joueur.id = match_joueur.joueur_id
GROUP BY joueur.id';
$stmt = $linkpdo->query($query);
$players = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
<title>Statistiques de l'équipe</title>
</head>
<body>

<h1>Statistiques de l'équipe</h1>

<h2>Résumé des matchs</h2>
<p>Nombre total de matchs : <?php echo $stats['total_matches']; ?></p>
<p>Matchs gagnés : <?php echo $stats['won']; ?> (<?php echo $won_percent; ?>%)</p>
<p>Matchs perdus : <?php echo $stats['lost']; ?> (<?php echo $lost_percent; ?>%)</p>


<h2>Tableau des joueurs</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Statut actuel</th>
        <th>Poste préféré</th>
        <th>Sélections en tant que titulaire</th>
        <th>Sélections en tant que remplaçant</th>
        <th>Moyenne des évaluations de l'entraîneur</th>
        <th>Pourcentage de matchs gagnés</th>
        <th>Nombre de sélections consécutives (facultatif)</th>
    </tr>
    <?php foreach ($players as $player) { ?>
    <tr>
        <td><?php echo $player['nom']; ?></td>
        <td><?php echo $player['prenom']; ?></td>
        <td><?php echo $player['photo']; ?></td>
        <td><?php echo $player['taille']; ?></td>
        <td><?php echo $player['poids']; ?></td>
        <td><?php echo $player['poste']; ?></td>
        <td><?php echo $player['statut']; ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>