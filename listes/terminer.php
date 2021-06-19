<?php
session_start();



$position = null;
// Récupération de la position de la tâche dans le tableau
if (isset($_GET['position'])) {
    $position = $_GET['position'];
}

//je verifie si il y a bien une entrée dans le tableau à la position donné
if (empty($_SESSION['taskList'][$position])) {

    echo '<a href="taskList.php>Cet element n\'existe pas, revenir à la liste</a>';
}
//je verifie si le tableau existe, si pas je le crée
if (isset($_SESSION['completedList']) === false) {
    $_SESSION['completedList'] = [];
}


foreach ($_SESSION['taskList'] as $pos => $tache) {
    // je parcours liste tache, et lorsque la position demandé correspond à celle du tableau($pos=$posiiton), j'ajoute la valeur correspondante au tableau des tâches terminées
    // et je supprime la tache de la liste des choses à faire (liste taches)
    if ($pos == $position) {
        $_SESSION['completedList'][] = $tache;
        unset($_SESSION['taskList'][$position]);
    }
}
header('location:completedList.php');
