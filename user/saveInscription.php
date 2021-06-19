<?php
require_once('../config/connexion_bdd.php');
$password = $_POST['password'];

// Verification que toutes les données demandées ont été indiquées par l'utilisateur
if (
    isset($_POST['email'], $_POST['username'], $_POST['password']) === false ||
    (empty($_POST['email']) ||
        empty($_POST['username']) ||
        empty($_POST['password']))
) {
    echo "<div style='center'>";
    echo "<h3>Des informations sont manquantes ! </h>";
    echo "<a href='inscription.php'>Retour à l'inscription</a>";
    echo "</div>";
}


// Permet de verifier que le MDP contient 1 minuscule, 1 majuscule, 1 chiffre et un caractere special et soit de 8 caratcteres minimum
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChar = preg_match('@[/#?!\@$%^&*-/]@', $password);

if (!$uppercase || !$lowercase || !$number || !$specialChar || strlen($password) < 8) {
    echo "Le mot de passe doit contenir au moins: 1 minuscule, 1 majuscule, 1 chiffre et un caractere special";
    exit;
}
//Enregistrement des nouvelles informations d'inscriptions données par l'utilisateur
try {
    $pdosth = $db->prepare('insert into utilisateur (email,username,password) values (:email,:username,:password)');
    //On sécurise le MDP avec un hash
    $result = $pdosth->execute([
        ':email' => $_POST['email'],
        ':username' => $_POST['username'],
        ':password' => hash('sha256', $_POST['password']),

    ]);
    // On controle si les données ont bien ete enregistrées 
    if ($result && $pdosth->rowCount() == 1) {
        header('location: ./connexion.php');
        exit;
    }
} catch (Exception $e) {
}

echo "<h2 style='color: red'>Une erreur s'est produite</h2>";
