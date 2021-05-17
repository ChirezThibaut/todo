<?php
session_start();

if (isset($_SESSION['user']) === false) {
    header('location: user/connexion.php');
    exit;
}
header('location:listes/addTask.php');
echo"<a href='user/deconnexion.php'>Deconnexion</a>";