<?php
// Connexion à la base de données
$db = new mysqli('localhost', 'root', '9dfe351b', 'sport-team-management');

// Récupération du numéro de licence du joueur à supprimer
$numero_licence = $_GET['numero_licence'];

// Préparation de la requête de suppression
$query = "DELETE FROM players WHERE numero_licence = $numero_licence";

// Exécution de la requête
$result = $db->query($query);

// Vérification du résultat de la requête
if ($result) {
    echo "Le joueur a été supprimé avec succès";
} else {
    echo "Erreur lors de la suppression du joueur : " . $db->error;
}

// Fermeture de la connexion à la base de données
$db->close();
?>