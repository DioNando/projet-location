<?php
include("connexion.php");

$req = $bdd->prepare('INSERT INTO table_voiture (Voiture, Designation, Loyer) VALUES (?,?,?)');
$req->execute(array($_POST['Voiture'], $_POST['Designation'], $_POST['Loyer_Journalier']));

header('Location: voitureListe.php');

?>

