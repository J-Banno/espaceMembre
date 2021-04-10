<?php
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
        <p id="info">Connectez-vous à votre espace. Sinon <a href="index.php">incrivez-vous</a>.</p>

        <!-- Formulaire -->
        <div id="form">
            <form method="post" action=" /index.php">
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
            </form>
        </div>

        <div id="button">
            <!-- Boutton -->
            <button type="submit">Se connecter</button>
        </div>
    </div>
</body>

</html>