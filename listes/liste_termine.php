<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="..\CSS\formulaire.css">

    <title>Liste des tâches terminées</title>
</head>

<body>
    
    <?php
    session_start();
    if (isset($_SESSION['user']) === false) {
        header('location: connexion.php');
        exit;
    }
    if (isset($_SESSION['liste_termine'])) {

        foreach ($_SESSION['liste_termine'] as $position => $tache) {
            echo '<div class="user-box"><ul>';
            echo '<li>';
            echo ($position + 1) . ' : ' . $tache['tache'];
            echo '</li></ul></div>';
        }
    }

    
    echo '<div class="user-box">';
    echo '<a href="liste_taches.php">Retour à la liste</a>';
    echo '<a href="addTask.php"> Ajouter une nouvelle tâche </a>';
    echo '</div>';
    echo '<div class="user-box">';
    echo "<a href='../user/deconnexion.php'>Deconnexion (/!\ vous perdrez votre liste!)</a>";
    echo '</div>';


    //recuperer la liste_termine, et la parocurire avec for each
    ?>