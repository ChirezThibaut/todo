<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="..\CSS\formulaire.css">

</head>

<body>
  <div class="login-box">

<h2>Inscription</h2>
    <form action="sauvegardeInscription.php" method="POST">
      <div class="user-box">
        
        <input type="email" name="email" id="email" required="">
        <label>Email</label>
      </div>
      <div class="user-box">
       
        <input type="text" name="username" id="username" required="">
        <label>Pseudo</label>
      </div>
      <div class="user-box">
        
        <input type="password" name="password" id="password" required="">
        <label>Mot de passe</label>
      </div>
      <a href="Connexion.php">
        Déjà inscrit?
      </a>
      <div class="test">
        <input type="submit" value="Inscription">
      </div>
    </form>
  </div>
</body>

</html>