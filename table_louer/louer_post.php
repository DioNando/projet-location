<?php
include("../connexion/connexion.php");


if(isset($_POST['ajout'])){
	$req = $bdd->prepare('INSERT INTO table_louer (ID_Locataire, ID_Voiture, NBJour, Date_Location) VALUES (?,?,?,?)');
	$req->execute(array($_POST['ID_Locataire'], $_POST['ID_Voiture'], $_POST['nb_Jour'], $_POST['date_Location']));
}

header('Location: louerListe.php');

?>

