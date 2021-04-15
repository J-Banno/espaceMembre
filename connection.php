<?php
//session
session_start();
if (isset($_SESSION['connect'])) {
    header('Location: /espaceMembre/connection.php');
}
//Import basse de donnée
require('src/connection.php');

//Vérification formulaire
if (!empty($_POST['mail']) && !empty($_POST['pass'])) {

    //Variable
    $email     = $_POST['mail'];
    $passeword = $_POST['pass'];
    $error = 1;
    //Encrypter le pass
    $passeword = "hi1" . sha1($passeword . "*oko*59") . "25";

    //Requête
    $req = $db->prepare('SELECT * FROM users WHERE mail = ?');
    $req->execute(array($email));

    while ($user = $req->fetch()) {
        if ($passeword == $user['pass']) {
            $error = 0;
            $_SESSION['connect'] = 1;
            $_SESSION['pseudo'] = $user['pseudo'];

            //Connexion automatique
            if (isset($POST['connect'])) {
                //Création d'un cookie
                setcookie('log', $user['secret'], time() + 365 * 24 * 3600, '/', null, false, true);
            }
            header('Location: /espaceMembre/connection.php?success=1');
        }
    }
    if ($error == 1) {
        header('Location: /espaceMembre/connection.php?error=1');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="design/default.css">
</head>

<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <div id="container">
        <p id="info">Connectez-vous à votre espace. Sinon <a href="index.php">inscrivez-vous</a>.</p>

        <!-- Gestion des erreurs -->
        <?php
        if (isset($_GET['error'])) {
            echo '<p id="error">Impossible de vous identifier.</p>';
        } else if (isset($_GET['success'])) {
            echo '<p id="success">Vous êtes connecté.</p>';
        }
        ?>
        <!-- Formulaire -->
        <div id="form">
            <form method="post" action="connection.php">
                <table>
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
                </table>
                <p><label>
                        <input type="checkbox" name="connect" checkdate>Connexion automatique</label>
                </p>
                <div id="button">
                    <!-- Boutton -->
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </div>


    </div>
</body>

</html>