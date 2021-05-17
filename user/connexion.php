<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./node_modules\bootstrap\dist\css\bootstrap.min.css">
</head>

<body>
  <div class="container mt-5" >


    <form action="user/checkConnexion.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="username" id="username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-primary">Connexion</button>
      <button formaction="user/inscription.php" class="btn btn-primary">Pas encore inscrit?</button>
    </form>
  </div>
</body>

</html>