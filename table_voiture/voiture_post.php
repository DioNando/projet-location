<?php
include("../connexion/connexion.php");


if(isset($_POST['ajout'])){
	$req = $bdd->prepare('INSERT INTO table_voiture (Voiture, Designation, Loyer) VALUES (?,?,?)');
	$req->execute(array($_POST['Voiture'], $_POST['Designation'], $_POST['Loyer_Journalier']));
}

header('Location: voitureListe.php');

?>