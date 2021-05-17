<!doctype html>
<html lang="en">

<head>
  <title>Liste des tâches à faire</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="..\CSS\formulaire.css">
</head>

<body>
<h2 style="color:#517467">Listes des tâches à faire:</h2>
  <?php
  session_start();
  if (isset($_SESSION['user']) === false) {
    header('location: connexion.php');
    exit;
  }

  if (isset($_SESSION['liste_taches'])) {

    foreach ($_SESSION['liste_taches'] as $position => $tache) {
      echo '<div class="user-box">' . '<ul>';
      echo '<li>';
      echo $position . ' : ' . $tache['tache'];
      echo '<a href="supprimer.php?position=' . $position .  '"> Supprimer de la liste </a>';
      echo '&nbsp';
      echo '<a href="terminer.php?position=' . $position .  '"> Tâche terminée </a>';
      echo '</li></ul></div>';
    }
  }
 echo'<div class="user-box">';
  echo '<a href="addTask.php"> Ajouter une nouvelle tâche </a>';
  echo '<a href="../user/deconnexion.php">Deconnexion (/!\ vous perdrez votre liste!)</a>';
  echo '<a href="../listes/liste_termine.php">Tâches terminées</a>';
  echo'</div> ';
      
     
  ?>
</body>
</html>