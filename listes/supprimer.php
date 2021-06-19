<?php
session_start();
//Récupération de la position de la tâche à supprimer
$position = $_GET['position'];
if (empty($_SESSION['taskList'][$position])) {

    echo '<a href="taskList.php>Cet element n\'existe pas, revenir à la liste</a>';
} else {
    //Suppression de la tâche 
    unset($_SESSION['taskList'][$position]);
}

header('location:taskList.php');
