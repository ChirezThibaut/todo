<?php
session_start();
//Verification que l'utilisateur est bien connecté, sinon on le redirige
if (isset($_SESSION['user']) === false) {
  header('location: ../user/connexion.php');
  exit;
}
?>
<!-- Formulaire d'ajout d'une nouvelle tâche-->
<!doctype html>
<html lang="en">

<head>
  <title>To Do List</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="..\CSS\formulaire.css">
</head>

<body>
  <div class="login-box">
    <h2>To Do List:</h2>
    <form action="sauvegarde.php" method="post">
      <div class="user-box">
        <input type="text" name="tache" required="">
        <label>Ajouter une tâche</label>
      </div>

      <div class="test">
        <input type="submit" value="Ajouter">

      </div>
      <div class="user-box">
        <a href='../user/deconnexion.php'>Deconnexion (/!\ vous perdrez votre liste!)</a>
      </div>
      
    </form>
  </div>
  <div>
        <a href='../listes/taskList.php' class="hostNewTask">Acceder à la liste des tâches</a>
      </div>
</html>