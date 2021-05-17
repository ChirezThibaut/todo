<?php
// le try/catch permet de gerer les exceptions qui peuvent arrivé avec cette commande
// le catch dit comment on va gerer si il y a une erreur
$user='root';
$password ='molimomo';
try {
    $db = new PDO('mysql:host=localhost:3300;dbname=admin', $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>