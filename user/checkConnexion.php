<?php
session_start();
require_once('../config/connexion_bdd.php');
//on verifie email et password, qu'ils sont bien present et comforme
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
    //cette fois, on n'ajoute pas mais on va selectionner un utilisateur
    $result = $pdosth->execute([

        ':username' => strtolower ($_POST['username']),
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
    // on recupere ensuite l'utilisateur avec fetch (ou fetchall qui retourne tout les resultats) ici avec fetch_assoc, on recupere sous forme d'un tableau assoc
    $utilisateur = $pdosth->fetch(PDO::FETCH_ASSOC);
    //on ne garde pas le mdp en session donc on le supprime de la session
    unset($utilisateur['password']);
    // et on stock ensuite l'utilisatuer dans la session, si il est stocké, c'est qu'il est connecté, si pas il faut qu'un utilisateur se connecte
    $_SESSION['user'] = $utilisateur;;
    header('location: ../index.php');
} catch (Exception $e) {
}
