<?php
session_start();

require('src/connection.php');
//Vérication contenu
if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['pass']) && !empty($_POST['confirmPass'])) {

    //Variables
    $pseudo        = $_POST["pseudo"];
    $email         = $_POST["mail"];
    $pass          = $_POST["pass"];
    $confirmPass   = $_POST["confirmPass"];

    //Controle mot de passe identique
    if ($pass != $confirmPass) {
        header('Location: /espaceMembre/index.php?error=1&pass=1');
        exit();
    }

    //Controle si le mail est déjà utilisé
    $req = $db->prepare("SELECT count(*) as numberEmail FROM users WHERE mail = ?");
    $req->execute(array($email));

    while ($controlEmail = $req->fetch()) {
        if ($controlEmail['numberEmail'] != 0) {
            header('location: /espaceMembre/index.php?error=1&email=1');
            exit();
        }
    }

    // HASH
    $secret = sha1($email) . time();
    $secret = sha1($secret) . time() . time();

    // CRYPTAGE DU PASSWORD
    $pass = "hi1" . sha1($pass . "*oko*59") . "25";

    // ENVOI DE LA REQUETE
    $req = $db->prepare("INSERT INTO users(pseudo, mail, pass, secret) VALUES(?,?,?,?)");

    $value = $req->execute(array($pseudo, $email, $pass, $secret));

    header('location: /espaceMembre/index.php?success=1');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace membre</title>
    <link rel="stylesheet" type="text/css" href="design/default.css">
</head>

<body>
    <header>
        <h1>Insription</h1>
    </header>
    <div class="container">
        <!--Connexion-->
        <?php
        if (!isset($_SESSION['connect'])) { ?>

            <p id="info">Bienvenue, pour en voire plus, inscrivez-vous. Sinon <a href="connection.php">connectez-vous</a>.</p>
            <!----- Gestion des erreurs ---->
            <?php
            if (isset($_GET['error'])) {
                //Pass différents
                if (isset($_GET['pass'])) {
                    echo '<p id="error"> Vérifier votre mot de passe.</p>';
                } //Mail existant
                else if (isset($_GET['email'])) {
                    echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
                }
            } //Succé
            else if (isset($_GET['success'])) {
                echo '<p id="success">Inscription prise  en compte.</p>';
            }
            ?>

            <!-- Formulaire -->
            <div id="form">
                <form method="POST" action="index.php">
                    <table>
                        <!-- Pseudo -->
                        <tr>
                            <td>Pseudo</td>
                            <td>
                                <input name="pseudo" type="text" placeholder="Votre pseudo" required>
                            </td>
                        </tr>
                        <!-- Email -->
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" name="mail" placeholder="email@gmail.com" required>
                            </td>
                        </tr>

                        <!-- Mot de passe -->
                        <tr>
                            <td>Mot de passe</td>
                            <td>
                                <input type="password" name="pass" placeholder="*****" required>
                            </td>
                        </tr>
                        <!-- Confirmation mot de passe -->
                        <tr>
                            <td>Confirmer mot de passe</td>
                            <td>
                                <input type="password" name="confirmPass" placeholder="*****" required>
                            </td>
                        </tr>
                    </table> <!-- Boutton -->
                    <div id="button">
                        <button type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        <?php } else { ?>

            <p id="info">Bonjour <?= $_SESSION['pseudo'] ?></p>

        <?php } ?>


    </div>
</body>

</html>