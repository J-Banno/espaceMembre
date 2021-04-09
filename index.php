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
    <p>Bienvenue, pour en voire plus, inscrivez-vous.</p>

    <!-- Formulaire -->
    <table>
        <form method="post" action=" /index.php">
            <!-- Pseudo -->
            <tr>
                <td>Pseudo</td>
                <td>
                    <input for="pseudo" name="pseudo" type="text" required>
                </td>
            </tr>
            <!-- Email -->
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="mail" required>
                </td>
            </tr>

            <!-- Mot de passe -->
            <tr>
                <td>Mot de passe</td>
                <td>
                    <input type="password" name="pass" required>
                </td>
            </tr>
            <!-- Confirmation mot de passe -->
            <tr>
                <td>Confirmer votre mot de passe</td>
                <td>
                    <input type="password" name="confirmPass" required>
                </td>
            </tr>
            <!-- Boutton -->
            <tr>
                <td>
                    <button type="submit">Valider</button>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>