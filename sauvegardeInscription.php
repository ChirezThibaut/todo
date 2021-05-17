<?php
require_once('config/connexion_bdd.php');

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

// on va preparer une requete puis l'executer (la premierer()donne le nom des colonne, et les 2ieme ce qui va y etre mis )
// le prepare va renvoyer un PDOstatment que l'on va stocker dans $pdosth
// et on va executer le pdostatment, ce qui va remplacer les :email, etc , par les données envoyé par l'utilisateur
try {
    $pdosth = $db->prepare('insert into utilisateur (email,username,password) values (:email,:username,:password)');
    // et on recupere le resultat du execute dans $result
    // on dit que :email,etc doit etre remplacé par ce que l'utilisateur envoit dans le formulaire (sous forme hasher, pour qu'il ne soit pas lisible(sha256 est le type de hash))
    // on peut rajouter un salt au hash, pour eviter que par exemple, 2 mdp identiques aient le meme hashage
    $result = $pdosth->execute([
        ':email' => hash('sha256', $_POST['email']),
        ':username' => hash('sha256',$_POST['username']),
        ':password' => hash('sha256',$_POST['password']),

    ]);
    // on va reuperer les lignes de la bdd affecté, pour savoir si ca c'est bien deroulé
    if ($result && $pdosth->rowCount() == 1) {
        header('inscription.php');
        exit;
    }
} catch (Exception $e) {
}

echo "<h2 style='color: red'>Un erreur c'est produite</h2>";
