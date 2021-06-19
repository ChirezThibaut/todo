<?php
session_start();

if (isset($_SESSION['user'])) { // Si tu es connecté on te déconnecte et on te redirige vers une page.

    // Supression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    header('location: connexion.php');
} else { // Dans le cas contraire on empêche d'accéder à cette page en redirigeant vers la page indiquée

    header('location: connexion.php');
}
