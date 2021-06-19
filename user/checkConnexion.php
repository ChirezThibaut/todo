<?php
session_start();
require_once('../config/connexion_bdd.php');
//Verification username et MDP
if (
    isset($_POST['username'], $_POST['password']) === false ||

    (empty($_POST['username']) ||
        empty($_POST['password']))
) {
    header('location:connexion.php');
    exit;
}
try {
    $pdosth = $db->prepare('select * from utilisateur where username=:username and password=:password limit 1');
    //On va aller rechercher l'utilisateur dans le BDD
    $result = $pdosth->execute([

        ':username' => strtolower($_POST['username']),
        ':password' => hash('sha256', $_POST['password']),

    ]);
    // si le resultats n'est pas le bon ou c'est mal executé
    if (!$result) {
        echo "<h2 style='color: red'>Une erreur c'est produite</h2>";
        exit;
    }
    if ($pdosth->rowCount() === 0) {
        echo "<h2 style='color: red'>Utilisateur inconnu</h2>";
        exit;
    }
    // on recupere l'utilisateur sous forme d'un tableau associatif
    $utilisateur = $pdosth->fetch(PDO::FETCH_ASSOC);
    //on ne garde pas le mdp en session donc on le supprime de la session
    unset($utilisateur['password']);
    // Si l'utilisateur est en session, c'est qu'il et connecté
    $_SESSION['user'] = $utilisateur;;
    //Dans le cas contraire, il est redirigé vers l'index
    header('location: ../index.php');
} catch (Exception $e) {
}
