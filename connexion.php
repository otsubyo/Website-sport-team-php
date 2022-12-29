<?php
    session_start();
    if (isset($_GET['d'])) {
        session_start();
        session_destroy();
        header('Location: connexion.php');
        exit();
    }
    if (isset($_SESSION['login'])) {
        header('Location: accueil.php');
        exit();
    }

    (string) $ch_username = NULL;
    (string) $ch_pwd = NULL;
    (string) $username = NULL;
    (string) $userpwd = NULL;
    (array) $data = NULL;
    (string) $color_mdp = '#2b3d58';
    
    if (isset($_POST['btn_connexion'])){
        // Utilisateur connecté
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

        $ch_username = hash("sha256",$_POST['user_id']);
        $ch_pwd = hash("sha256",$_POST['user_pwd']);
        $res = $linkpdo->query('SELECT * FROM user_connect');

        // Affichage des entrées du résultat une à une
        while ($data = $res->fetch()) {
            $userpwd = $data['pass_wd'];
            $username = $data['user_name'];
        }
        $res->closeCursor();
        
        if (!(strcmp($ch_username,$username) == 0 && strcmp($ch_pwd,$userpwd) == 0)) {
            $color_mdp = '#d00412';
        } else{
            $color_mdp = '#2b3d58';
            session_start();
            $_SESSION['login'] = $username;
            header('location: accueil.php');
        }
    }
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
        <div class="center">
            <div class="header">
                Se connecter
            </div>
            <form action="" method="post">
                <input type="text" placeholder="Nom d'utilisateur" name="user_id">
                <i class="far fa-envelope"></i>
                <input id="pswrd" type="password" placeholder="Mot de passe" name="user_pwd">
                <i class="fas fa-lock" onclick="show()"></i>
                <input type="submit" value="Connexion" name="btn_connexion" style="background-color: <?=$color_mdp?>">
            </form>
        </div>
    </body>
    <script>
        function show() {
            var pswrd = document.getElementById('pswrd');
            var icon = document.querySelector('.fas');
            if (pswrd.type === "password") {
                pswrd.type = "text";
                pswrd.style.marginTop = "20px";
                icon.style.color = "#ed7e0e";
            } else {
                pswrd.type = "password";
                icon.style.color = "grey";
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap');

        body {
            margin: 0;
            padding: 0;
            background: #2b3d58;
            height: 100vh;
            overflow: hidden;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .center {
            width: 430px;
            margin: 130px auto;
            position: relative;
        }

        .center .header {
            font-size: 28px;
            font-weight: bold;
            color: white;
            padding: 25px 0 30px 25px;
            background: #7c8594;
            border-bottom: 1px solid #7c8594;
            border-radius: 2px 2px 0 0;
        }

        .center form {
            position: absolute;
            background: white;
            width: 100%;
            padding: 50px 10px 0 30px;
            box-sizing: border-box;
            border: 1px solid #eeeee4;
            border-radius: 0 0 2px 2px;
        }

        form input {
            height: 50px;
            width: 90%;
            padding: 0 10px;
            border-radius: 3px;
            border: 1px solid silver;
            font-size: 18px;
            outline: none;
        }

        form input[type="password"] {
            margin-top: 20px;
        }

        form i {
            position: absolute;
            font-size: 25px;
            color: grey;
            margin: 15px 0 0 -45px;
        }

        i.fa-lock {
            margin-top: 35px;
        }

        form input[type="submit"] {
            margin-top: 40px;
            margin-bottom: 40px;
            width: 130px;
            height: 45px;
            color: white;
            cursor: pointer;
            line-height: 45px;
            border-radius: 45px;
            border-radius: 5px;
            margin-left: 30%;
            margin-right: 30%;
        }

        form input[type="submit"]:hover {
            background: #0e1d35;
            transition: .5s;
        }

        form a {
            text-decoration: none;
            font-size: 18px;
            color: #2b3d58;
            padding: 0 0 0 20px;
        }
    </style>
</html>