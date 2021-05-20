<?php

session_start();
$tache = $_POST;

//1. on cree le tableau $tache dans session si il n'existe pas 
//2. mnt qu'il existe on veut ajouter des données au tableau $tache
if (isset($_SESSION['taskList']) !== null) {
    $_SESSION['taskList'][] = $tache;
}
header('location:taskList.php');
