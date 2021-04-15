<?php
//Initialisation de la session
session_start();
//Désactiver notre session
session_unset();
//Détruire la session
session_destroy();
//Drestruction cookie
setcookie('log', '', time() - 3444, '/', null, false, true);
//Redirection
header('location: /espaceMembre/index.php');
