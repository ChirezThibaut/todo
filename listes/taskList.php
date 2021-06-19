<!doctype html>
<html lang="en">
<!-- Liste des tâches à réaliser-->

<head>
  <title>Liste des tâches à faire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="..\CSS\formulaire.css">
</head>

<body>
  <h2 style="color:#ffffff; margin:20px 0px 60px 20px">Listes des tâches à faire:</h2>
  <?php
  session_start();
  //Verification que l'utilisateur est bien connecté, sinon on le redirige
  if (isset($_SESSION['user']) === false) {
    header('location: connexion.php');
    exit;
  }

  if (isset($_SESSION['taskList'])) {
    // Creation de la liste depuis les connées du tableau de session
    foreach ($_SESSION['taskList'] as $position => $tache) {
      echo '<div>' . '<ul>';
      echo '<li class="list">';
      echo $position . ' : ' . $tache['tache'];
      echo '<a href="supprimer.php?position=' . $position .  '"class="deleteTask"> Supprimer de la liste </a>';
      echo '&nbsp';
      echo '<a href="terminer.php?position=' . $position .  '"class="taskEnded"> Tâche terminée </a>';
      echo '</li></ul></div>';
    }
  }
  echo '<div>';
  echo '<a href="addTask.php"class="newTask"> Ajouter une nouvelle tâche </a>';
  echo '<a href="../user/deconnexion.php"class="deconnexion">Deconnexion (/!\ vous perdrez votre liste!)</a>';
  echo '<a href="../listes/completedList.php"class="mainTaskEnded">Tâches terminées</a>';
  echo '</div> ';


  ?>
</body>

</html>