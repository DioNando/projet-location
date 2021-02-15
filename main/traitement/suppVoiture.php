<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['ID_Voiture'])){
		$ID_Voiture = $_POST['ID_Voiture'];
		$sql = "DELETE FROM table_voiture WHERE ID_Voiture = '$ID_Voiture'";

		$bdd->query($sql);
	}

	header('Location: ../table_voiture/voitureListe.php');
?>