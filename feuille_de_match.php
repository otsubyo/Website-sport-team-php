<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
<!-- Formulaire de sélection des joueurs -->
<form id="selection-form" action="#" method="post">
  <!-- Champ caché pour stocker le nombre minimum de joueurs -->
  <input type="hidden" name="min-players" value="11">

  <!-- Bouton pour ajouter un joueur à la sélection -->
  <button type="button" id="add-player-button">Ajouter un joueur</button>

  <!-- Zone d'affichage des joueurs sélectionnés -->
  <div id="selected-players">
    <!-- Template de joueur sélectionné (caché par défaut) -->
    <div class="selected-player" style="display: none;">
      <!-- Photo du joueur -->
      <img src="" alt="Photo du joueur">
      <!-- Nom et prénom du joueur -->
      <p class="player-name"></p>
      <!-- Taille et poids du joueur -->
      <p class="player-size-weight"></p>
      <!-- Poste préféré du joueur -->
      <p class="player-position"></p>
      <!-- Commentaires et évaluations de l'entraineur -->
      <p class="player-comments-ratings"></p>
      <!-- Bouton pour définir le joueur comme titulaire ou remplaçant -->
      <button type="button" class="player-status-button"></button>
      <!-- Bouton pour retirer le joueur de la sélection -->
      <button type="button" class="remove-player-button">Retirer</button>
    </div>
  </div>

  <!-- Bouton de validation de la sélection -->
  <button type="submit" id="validate-selection-button" disabled>Valider la sélection</button>
</form>

<!-- Formulaire de modification de la sélection pour un match donné -->
<form id="match-form" action="#" method="post">
  <!-- Sélection des joueurs titulaires et remplaçants -->
  <div id="match-players">
    <!-- Template de joueur titulaire ou remplaçant -->
    <div class="match-player">
      <!-- Photo du joueur -->
      <img src="" alt="Photo du joueur">
      <!-- Nom et prénom du joueur -->
      <p class="player-name"></p>
      <!-- Bouton pour définir le joueur comme titulaire ou remplaçant -->
      <button type="button" class="player-status-button"></button>
      <!-- Bouton pour retirer le joueur de la sélection -->
      <button type="button" class="remove-player-button">Retirer</button>
    </div>
  </div>

  <!-- Bouton de validation de la sélection pour le match -->
  <button type="submit" id="validate-match-button">Valider la sélection pour le match</button>
</form>
<body>