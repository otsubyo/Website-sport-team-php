<?php

if(isset($_POST['submit'])){
    // Récupération des données du formulaire
    $numero_licence = $_POST['numero_licence'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $poste = $_POST['poste'];
    $statut = $_POST['statut'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '9dfe351b', 'sport-team-management');

    // Préparation de la requête d'insertion
    $query = "INSERT INTO joueurs (numero_licence,nom, prenom, taille, poids, poste, statut) VALUES ('$nom', '$prenom', '$taille', '$poids', '$poste', '$statut')";

    // Exécution de la requête
    if($conn->query($query) === TRUE){
        echo "Joueur ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un joueur</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="shortcut icon" type="image/jpg" href="data/basketball-hoop.png" />
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
        <a href="connexion.php?d=1">Déconnexion</a>

<form method="post" action="">
    <label>N° de licence :</label>
    <input type="text" name="numero_licence" required>
    <br>
    <label>Nom :</label>
    <input type="text" name="nom" required>
    <br>
    <label>Prénom :</label>
    <input type="text" name="prenom" required>
    <br>
    <label>Taille :</label>
    <input type="text" name="taille" required>
    <br>
    <label>Poids :</label>
    <input type="text" name="poids" required>
    <br>
    <label>Poste :</label>
    <input type="text" name="poste" required>
    <br>
    <label>Statut :</label>
    <input type="text" name="statut" required>
    <br>
    <input type="submit" name="submit" value="Ajouter joueur">
</form>
</body>

    <body>
        <!-- Menu de navigation -->
        <div class="barre_nav">
            <a href="accueil.php">Accueil</a>
            <div class="subnav">
                <button class="subnavbtn">Gestion <i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="gestion_match.php">Gestion des matchs</a>
                    <a href="">Gestion des joueurs</a>
                </div>
            </div>
            <a href="feuille_de_match.php">Feuille de match</a>
            <a href="statistiques.php">Statistiques</a>
            <a href="connexion.php?d=1">Deconnexion</a>
        </div>
        <!-- Fin du menu de navigation -->
        <!-- Formulaire d'édition d'un joueur -->
        <div class="formulaire">
            <form action="" method="$_POST">
                <div class="text">Ajout d'un joueur</div>
                <div class="data">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div class="data">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                </div>
                <div class="data">
                    <label for="numero_licence">Numéro de licence</label>
                    <input type="text" id="numero_licence" name="numero_licence">
                </div>
                <div class="data">
                    <label for="taille">Taille</label>
                    <input type="text" id="taille" name="taille">
                </div>
                <div class="data">
                    <label for="poids">Poids</label>
                    <input type="text" id="poids" name="poids">
                </div>
                <div class="data">
                    <label for="poste">Poste</label>
                    <input type="text" id="poste" name="poste">
                </div>
                <div class="data">
                    <label for="statut">Statut</label>
                    <input type="text" id="numero_maillot" name="statut">
                </div>
                <div class="data">
                    <label for="avatar">Importer une photo</label>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                </div>
                <div class="btn">
                    <button type="submit">Valider</button>
                </div>
            </form>
        </div>
        
        </div>
    </body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
        body {
            margin: 0;
            padding: 0;
            background: white;
            height: 92.7vh;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .formulaire{
            z-index: 0;
            position: absolute;
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 117%;
            background: #bcc9e0;
            padding: 30px 30px;
            box-sizing: border-box;
            align-items: center;
        }

        form{
            position: absolute;
            width: 400px;
            height: auto;
            background: #15253f;
            padding: 5% 5%;
            box-sizing: border-box;
        }

        .btn button{
            background-color: #2b3d58;
            border: none;
            margin-left: 35%;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .text{
            color: #fff;
            font-weight: 500;
            font-size: 30px;
            margin-bottom: 10%;
            text-align: center;
        }

        .data{
            position: relative;
            margin: 3%;
            color: white;
        }

        .data input{
            width: 100%;
            padding: 8px 0;
            font-size: 16px;
            color: #fff;
            letter-spacing: 1px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
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
            z-index: 1;
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
    </style>
</html>