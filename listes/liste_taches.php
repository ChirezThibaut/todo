<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['user']) === false) {
    header('location: connexion.php');
    exit;
  }

  if (isset($_SESSION['liste_taches'])) {

    foreach ($_SESSION['liste_taches'] as $position => $tache) {
      echo '<div class="list-group mt-2">' . '<ul>';
      echo '<li class="list-group-item">';
      echo $position . ' : ' . $tache['tache'];
      echo '<a href="supprimer.php?position=' . $position .  '"> Supprimer </a>';
      echo '&nbsp';
      echo '<a href="terminer.php?position=' . $position .  '"> Tâche terminée </a></div>';
      echo '</li></ul></div>';
    }
  }

  echo '<a href="addTask.php"> Ajouter une nouvelle tâche </a>';
  echo '<div>';
  echo "<a href='../deconnexion.php'>Deconnexion</a>";
  echo '</div>';
  ?>