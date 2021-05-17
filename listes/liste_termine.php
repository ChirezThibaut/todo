<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">

    <title>Hello, world!</title>
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

            echo '<li class="list-group mt-2">';
            echo ($position + 1) . ' : ' . $tache['tache'];
            echo '</li>';
        }
    }
    echo '<a href="liste_taches.php">Retour à la liste</a>' . ' ou ' . '<a href="addTask.php"> Ajouter une nouvelle tâche </a>';
    echo '<div>';
    echo "<a href='../deconnexion.php'>Deconnexion</a>";
    echo '</div>';


    //recuperer la liste_termine, et la parocurire avec for each
    ?>