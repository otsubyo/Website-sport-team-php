<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit();
}
$licence = $_GET['id'];
$server = "localhost";
$db = "sport-team-management";
$login = "root";
$mdp = "9dfe351b";
try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $linkpdo->prepare("SELECT * FROM joueur WHERE numero_licence = $licence");
if ($req->execute()) {
    $data = $req->fetch();
} else {
    echo "Erreur";
}
$numero_licence = $data[0];
$nom = $data[1];
(string) $prenom = $data[2];
(int) $taille = $data[4];
(int) $poids = $data[5];
(string) $poste = $data[6];
(string) $statut = $data[7];

// Modification des données
if (isset($_POST['validate'])) {
    (string) $nom = $_POST['player-name'];
    (string) $prenom = $_POST['player-last_name'];
    (int) $taille = $_POST['player-height'];
    (int) $poids = $_POST['player-weight'];
    (string) $poste = $_POST['player-post'];
    (string) $statut = $_POST['player-statut'];
    $req = $linkpdo->prepare("UPDATE joueur SET nom = '$nom', prenom = '$prenom', taille = $taille, poids = $poids, poste = '$poste', statut = '$statut' WHERE numero_licence = $licence");
    if ($req->execute()) {
        header('Location: gestion_joueurs.php');
    } else {
        echo "Erreur";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
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
                <h2><b>Modifier un joueur</b></h2>
            </legend><br>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Numéro de licence</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="player-licence" class="form-control" value="<?= $numero_licence?>" type="text" disabled>
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Nom</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="player-name" value="<?= $nom?>" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Prénom</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="player-last_name" value="<?= $prenom?>" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Taille</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="player-height" value="<?= $taille?>" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Poids</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="player-weight" value="<?= $poids?>" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Poste</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="player-post" value="<?= $poste?>" class="form-control"  type="text">
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
                            <option value=""><?= $statut?></option>
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
                        <input name="file" placeholder="Statut actuel" class="form-control"  type="file" disabled>
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