<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['modifier'])){
		$ID_Locataire = $_POST['ID_Locataire'];
		$ID_Voiture = $_POST['ID_Voiture'];
		$NbJour = $_POST['NbJour'];
		$Date_Location = $_POST['Date_Location'];
		$sql = "UPDATE table_louer SET ID_Voiture = '$ID_Voiture', NbJour = '$NbJour', Date_Location = '$Date_Location' WHERE ID_Locataire = '$ID_Locataire'";

		$bdd->query($sql);
	}
	header('Location: ../table_louer/louerListe.php');

?>