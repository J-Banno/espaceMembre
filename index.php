<?php
//inscription
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

    <h1>Insription</h1>
    <p>Bienvenue, pour en voire plus, inscrivez-vous. Sinon <a href="connection.php">connectez-vous</a>.</p>

    <!-- Formulaire -->
    <table>
        <form method="post" action=" /index.php">
            <!-- Pseudo -->
            <tr>
                <td>Pseudo</td>
                <td>
                    <input for="pseudo" name="pseudo" type="text" placeholder="Votre pseudo" required>
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
        </form>
    </table>

    <!-- Boutton -->
    <button type="submit">S'inscrire</button>

</body>

</html>