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

<style>
    @import url('https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap');

    body {
        margin: 0;
        padding: 0;
        background: white;
        height: 92.7vh;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .conteneur {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }

    .new_player{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }

    .new_player .btn_div{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 10%;
    }

    .new_player .btn_div .btn{
        cursor: pointer;
        background-color: white;
        color: #2B3D5B;
        border: solid 1px #2B3D5B;
        width: auto;
        max-height: 10%;
        padding: 10px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .conteneur .card {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 10px;
        margin: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 20%;
        height: auto;
        background-color: white;
        border: #2b3d58 solid 1px;
        border-radius: 3px;
    }

    .conteneur .card img {
        border-radius: 50%;
        border: solid 4px #2b3d58;
        max-width: 50%;
        height: 50%;
    }

    .conteneur .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .conteneur .container {
        display: block;
        margin-top: 9px;
        width: auto;
    }

    .conteneur .container h4 {
        font-size: 20px;
        text-align: center;
        color: #2b3d58;
    }

    /* The navigation menu */
    .barre_nav {
        overflow: hidden;
        background-color: #2b3d58;
        transition: 0.3s;
    }

    /* Navigation links */
    .barre_nav a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: 0.3s;
    }

    /* The subnavigation menu */
    .subnav {
        float: left;
        overflow: hidden;
    }

    /* Subnav button */
    .subnav .subnavbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    /* Add a red background color to navigation links on hover */
    .barre_nav a:hover,
    .subnav:hover .subnavbtn {
        background-color: #15253f;
    }

    /* Style the subnav content - positioned absolute */
    .subnav-content {
        display: none;
        position: absolute;
        left: 0;
        background-color: #15253f;
        width: 100%;
        z-index: 1;
    }

    /* Style the subnav links */
    .subnav-content a {
        float: left;
        color: white;
        text-decoration: none;
    }

    /* Add a grey background color on hover */
    .subnav-content a:hover {
        background-color: #eee;
        color: black;
    }

    /* When you move the mouse over the subnav container, open the subnav content */
    .subnav:hover .subnav-content {
        display: block;
        z-index: 2;
    }

    .match_view {
        background-color: #fff;
        width: 100%;
        height: 100%;
    }

    .conteneur .card .btn_div {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 10%;
    }

    .conteneur .card .btn_div .btn1 {
        cursor: pointer;
        background-color: #2b3d58;
        width: auto;
        max-height: 10%;
        border: none;
        color: white;
        padding: 10px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .conteneur .card .btn_div .btn2 {
        cursor: pointer;
        background-color: red;
        width: auto;
        max-height: 10%;
        border: none;
        color: white;
        padding: 10px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>