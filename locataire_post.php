<?php
include("connexion.php");

$req = $bdd->prepare('INSERT INTO table_locataire (Locataire, Nom, Adresse) VALUES (?,?,?)');
$req->execute(array($_POST['Locataire'], $_POST['Nom'], $_POST['Adresse']));


header('Location: locataireListe.php');

?>

