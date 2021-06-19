<?php

session_start();
$tache = $_POST;

// Ajout d'une tâche à la liste
if (isset($_SESSION['taskList']) !== null) {
    $_SESSION['taskList'][] = $tache;
}
header('location:taskList.php');
