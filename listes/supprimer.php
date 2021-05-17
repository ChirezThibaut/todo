<?php
session_start();
//but de la page, supprimer l'entrée du tableau liste_tache (donc $_session['liste_taches][$position])
// on recupere la position de l'entree  à supprimer du tableau avec get 
$position = $_GET['position'];
// on verifie qu'il y a bien qqch à la position dans le tableau, et si elle existe, on la supprime, si pas on dis qu'lle n'existe pas
if (empty($_SESSION['liste_taches'][$position])) {

    echo '<a href="liste_taches.php>Cet element n\'existe pas, revenir à la liste</a>';
} else {
    unset($_SESSION['liste_taches'][$position]);
}

header('location:liste_taches.php');
