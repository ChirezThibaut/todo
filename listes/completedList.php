<!doctype html>
<html lang="en">
<!-- Liste des tâches terminées-->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="..\CSS\formulaire.css">

    <title>Liste des tâches terminées</title>
</head>

<body>
    <h2 style="color:#ffffff; margin:20px 0px 60px 20px">Listes des tâches terminées:</h2>
    <?php
    //Verification que l'utilisateur est bien connecté, sinon on le redirige
    session_start();
    if (isset($_SESSION['user']) === false) {
        header('location: connexion.php');
        exit;
    }
    if (isset($_SESSION['completedList'])) {
        // Ajout d'une tâche à la liste
        foreach ($_SESSION['completedList'] as $position => $tache) {
            echo '<div><ul>';
            echo '<li class="list">';
            echo ($position + 1) . ' : ' . $tache['tache'];
            echo '</li></ul></div>';
        }
    }
    echo '<div>';
    echo '<a href="addTask.php"class="newTask"> Ajouter une nouvelle tâche </a>';
    echo '<a href="../user/deconnexion.php"class="deconnexion">Deconnexion (/!\ vous perdrez votre liste!)</a>';
    echo '<a href="taskList.php"class="mainTaskEnded">Retour à la liste</a>';
    echo '</div>';

    ?>

</body>

</html>