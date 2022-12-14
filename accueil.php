<?php


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Se connecter</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="shortcut icon" type="image/jpg" href="data/basketball-hoop.png" />
    </head>
    <body>
        <!-- Menu de navigation -->
        <div class="barre_nav">
            <a href="#home">Accueil</a>
            <div class="subnav">
                <button class="subnavbtn">Gestion <i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                <a href="#gest_match">Gestion des matchs</a>
                <a href="#gest_joueur">Gestion des joueurs</a>
                </div>
            </div>
            <a href="#home">Feuille de match</a>
            <a href="#home">Statistique</a>
            <a href="#exit">Deconnexion</a>
        </div>
        <div class="match_view">

        </div>
        
           
    </body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap');
        body {
            margin: 0;
            padding: 0;
            background: #2b3d58;
            height: 100vh;
            font-family: 'Noto Sans TC', sans-serif;
        }

        /* The navigation menu */
        .barre_nav {
            overflow: hidden;
            background-color: #333;
        }

        /* Navigation links */
        .barre_nav a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
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
        .barre_nav a:hover, .subnav:hover .subnavbtn {
            background-color: #111;
        }

        /* Style the subnav content - positioned absolute */
        .subnav-content {
            display: none;
            position: absolute;
            left: 0;
            background-color: #111;
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
        }

        .match_view{
            background-color: #fff;
            width: 100%;
            height: 80%;
        }
    </style>