<?php
session_start();

if (isset($_SESSION['user'])) { // Si tu es connecté on te déconnecte et on te redirige vers une page.
 
    // Supression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
     
    header('location: connexion.php');

}else{ // Dans le cas contraire on t'empêche d'accéder à cette page en te redirigeant vers la page que tu veux.

    header('location: connexion.php');}