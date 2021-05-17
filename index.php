<?php
session_start();

if (isset($_SESSION['user']) === false) {
    header('location: connexion.php');
    exit;
}
header('location:listes/addTask.php');
echo"<a href='deconnexion.php'>Deconnexion</a>";