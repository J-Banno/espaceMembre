<?php
//Initialisation de la session
session_start();
//Désactiver notre session
session_unset();
//Détruire la session
session_destroy();

//Redirection
header('location: /espaceMembre/index.php');
