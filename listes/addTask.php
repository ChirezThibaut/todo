<?php
session_start();

if (isset($_SESSION['user']) === false) {
  header('location: connexion.php');
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
</head>

<body>
  <h1>To Do List:</h1>
  <form class="row g-3" action="sauvegarde.php" method="post">
    <div class="col-auto">
      Ajouter une tâche à la to do list:

    </div>
    <div class="col-auto">
      <input type="text" class="form-control" name="tache" placeholder="Exemple">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-success">Ajouter</button>

    </div>
    <div>
      <a href='../deconnexion.php'>Deconnexion</a>
    </div>
  </form>

</html>