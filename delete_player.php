<?php
// Connexion à la base de données
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Récupération du numéro de licence du joueur à supprimer
$numero_licence = $_GET['numero_licence'];

// Préparation de la requête de suppression
$query = "DELETE FROM players WHERE numero_licence = $numero_licence";

// Exécution de la requête
$stmt->execute(array(':numero_licence' => $numero_licence));

// Vérification du résultat de la requête
if ($result) {
    echo "Le joueur a été supprimé avec succès";
} else {
    //echo "Erreur lors de la suppression du joueur : " . $pdo->error;
}

// Fermeture de la connexion à la base de données
//$pdo->close();
//?>

