<?php
session_start();

//si on arrive sur la page, c'est que la tache est terminée
//on redirige vers une page avec la liste des taches terminées, et on supprime la tache de la liste_tache

//donc on recupere la tache avec la position depuis taskList, on la fait entré dans tableau tache_terminé, et on supprime tache de taskList
$position = null;

if (isset($_GET['position'])) {
    $position = $_GET['position'];
}
 
//je verifie si il y a bien une entrée dans le tableau à la position donné
if (empty($_SESSION['taskList'][$position])) {

    echo '<a href="taskList.php>Cet element n\'existe pas, revenir à la liste</a>';
}
//je verifie si le tableau existe, si pas je le cree
if (isset($_SESSION['completedList'])===false){
        $_SESSION['completedList']=[];

    }

    // je parcours liste tache, et lorsque la position demandé correspond a celle du tableau($pos=$posiiton), j'ajoute la valeur correspondant au tableau terminé
// et je supprime la tache de la liste des choses à faire (liste taches)
    foreach ($_SESSION['taskList'] as $pos => $tache) {
  
        if($pos==$position){
            $_SESSION['completedList'][]=$tache; 
            unset($_SESSION['taskList'][$position]);    
        
        }
       
    
}
header('location:completedList.php');
