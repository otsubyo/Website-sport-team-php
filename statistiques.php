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





//Requête SQL pour compter le nombre total de matchs
$sql = "SELECT COUNT(*) FROM matchs";
$result = $conn->query($sql);
$total_matches = $result->fetch_assoc();

// Calcul des pourcentages
$total = $row['total'];
$won = $row['won'];
$lost = $row['lost'];
$wonPercent = round($won / $total * 100, 2);
$lostPercent = round($lost / $total * 100, 2);

// Affichage des résultats
echo "<h2>Statistiques des matchs</h2>";
echo "<p>Nombre total de matchs : $total</p>";
echo "<p>Nombre de matchs gagnés : $won ($wonPercent%)</p>";
echo "<p>Nombre de matchs perdus : $lost ($lostPercent%)</p>";







// Fermeture de la connexion à la base de données
$conn->close();
?>












<!DOCTYPE html>
<html>
<head>
  <title>Statistiques des matchs</title>
</head>
<body>
  
  <h1>Statistiques des matchs</h1>
  
 
  
</body>
</html>