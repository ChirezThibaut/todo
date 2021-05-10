<?php
session_start();

//si on arrive sur la page, c'est que la tache est terminé
//on redirige vers une page avec la liste des taches terminées, et on supprime la tache de la liste_tache

//donc on recupere la tache avec la position depuis liste_taches, on la fait entré dans tableau tache_terminé, et on supprime tache de liste_taches
$position = null;

if (isset($_GET['position'])) {
    $position = $_GET['position'];
}
 
//je verifie si il y a bien une entrée dans le tableau à la position donné
if (empty($_SESSION['liste_taches'][$position])) {

    echo '<a href="liste_taches.php>Cet element n\'existe pas, revenir à la liste</a>';
}
//je verifie si le tableau existe, si pas je le cree
if (isset($_SESSION['liste_termine'])===false){
        $_SESSION['liste_termine']=[];

    }

    // je parcours liste tache, et lorsque la position demandé correspond a celle du tableau($pos=$posiiton), j'ajoute la valeur correspondant au tableau terminé
// et je supprime la tache de la liste des choses à faire (liste taches)
    foreach ($_SESSION['liste_taches'] as $pos => $tache) {
  
        if($pos==$position){
            $_SESSION['liste_termine'][]=$tache; 
            unset($_SESSION['liste_taches'][$position]);    
        
        }
       
    
}
header('location:liste_termine.php');
