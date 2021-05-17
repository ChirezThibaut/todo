<?php

session_start();
$tache = $_POST;

//1. on cree le tableau $tache dans session si il n'existe pas 
//2. mnt qu'il existe on veut ajouter des données au tableau $tache
if (isset($_SESSION['liste_taches']) !== null) {
    $_SESSION['liste_taches'][] = $tache;
}
header('location:liste_taches.php');
