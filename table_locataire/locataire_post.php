<?php
include("../connexion/connexion.php");


if(isset($_POST['ajout'])){
	$req = $bdd->prepare('INSERT INTO table_locataire (Locataire, Nom, Adresse) VALUES (?,?,?)');
	$req->execute(array($_POST['Locataire'], $_POST['Nom'], $_POST['Adresse']));
}

header('Location: locataireListe.php');

?>