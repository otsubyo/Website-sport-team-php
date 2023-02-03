<?php

if(isset($_POST['validate'])){
    // Récupération des données du formulaire
    (string) $numero_licence = $_POST['player-licence'];
    (string) $nom = $_POST['player-name'];
    (string) $prenom = $_POST['player-last_name'];
    (int) $taille = $_POST['player-height'];
    (int) $poids = $_POST['player-weight'];
    (string) $poste = $_POST['player-post'];
    (string) $statut = $_POST['player-statut'];
    $photo = '/'.$_FILES['file']['name'];

    // Connexion à la base de données de l'utilisateur test
    $server = "localhost";
    $db = "sport-team-management";
    $login = "root";
    $mdp = "9dfe351b";
    try {
        $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Préparation de la requête d'insertion

    $query = "INSERT INTO joueur VALUES('$numero_licence', '$nom', '$prenom', '$photo','$taille', '$poids', '$poste', '$statut')";
    // Vérification de l'upload du fichier
    $file_info = getimagesize($_FILES['file']['tmp_name']);
    $file_type = $_FILES['file']['type'];
    if ($file_info === false) {
        die("Le fichier n'est pas une image.\n");
    }
    if (!move_uploaded_file($_FILES['file']['tmp_name'], "players/".$_FILES['file']['name'])) {
        die("Erreur lors de l'upload du fichier.\n");
    }
    if (!strpos($file_type, "image/") === 0) {
       die("Le fichier n'est pas une image valide.\n");
    }
    // Exécution de la requête
    $req = $linkpdo->prepare($query);
    $req->execute();
    // Redirection vers la page de gestion des joueurs
    header('Location: gestion_joueurs.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un joueur</title>
    <link rel="stylesheet" href="styles/style-add-player.css">
    <link rel="stylesheet" href="styles/nav-bar-footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="JS/script-add-player.js"></script>
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
    </div>
        <!-- Fin du menu de navigation -->
        <!-- Formulaire d'édition d'un joueur -->
    <div class="container">
        <form class="well form-horizontal" action="" method="post"  id="contact_form" enctype="multipart/form-data">
            <fieldset>
                <legend>
                    <h2><b>Ajouter un joueur</b></h2>
                </legend><br>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Numéro de licence</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="player-licence" placeholder="N° de licence" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Nom</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="player-name" placeholder="Nom du joueur" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Prénom</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="player-last_name" placeholder="Prénom du joueur" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Taille</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="player-height" placeholder="Taille (en cm)" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Poids</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="player-weight" placeholder="Poids (en kg)" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Poste</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="player-post" placeholder="Poste" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Statut</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="player-statut" class="form-control selectpicker">
                                <option value="">Actif</option>
                                <option>Blessé</option>
                                <option>Suspendu</option>
                                <option>Absent</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Photo</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="file" placeholder="Statut actuel" class="form-control"  type="file">
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div>
                    <button type="submit" name="validate" class="btn btn-warning">Ajouter
                        <span class="glyphicon glyphicon-send">
                        </span>
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>