<?php
	include_once('../connexion/connexion.php');

	if(isset($_GET['ID_Voiture'])){
		$sql = "DELETE FROM table_voiture WHERE ID_Voiture = '".$_GET['ID_Voiture']."'";

		$bdd->query($sql);
	}

	header('Location: ../table_voiture/voitureListe.php');
?>