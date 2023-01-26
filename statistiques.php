<?php
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";

// Connexion à la base de données
 $conn = new mysqli('localhost', 'root', '9dfe351b', 'sport-team-management');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
} else {
    echo "Connexion réussie";
}

//Requête SQL pour compter le nombre total de matchs
$sql = "SELECT COUNT(*) FROM matchs";
$result = $conn->query($sql);
$total_matches = $result->fetch_assoc();

/*//Requête SQL pour récupérer les informations sur un joueur :
$sql = "SELECT nom, prenom, taille, poids, poste, statut, statut, poste, selections, evaluations, win_percent FROM joueurs WHERE id = '$numero_licence'";
$result = $conn->query($sql);
$player_data = $result->fetch_assoc();
*/



$numero_licence = $_POST['numero_licence'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $poste = $_POST['poste'];
    $statut = $_POST['statut'];

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