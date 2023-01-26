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

//Requête SQL pour récupérer les informations sur un joueur :
$sql = "SELECT statut, poste, selections, evaluations, win_percent FROM joueurs WHERE id = '$player_id'";
$result = $conn->query($sql);
$player_data = $result->f






?>