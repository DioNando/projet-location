<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['modifier'])){
		$ID_Louer = $_POST['ID_Louer'];
		$Locataire = $_POST['Locataire'];
		$ID_Locataire = $_POST['ID_Locataire'];
		$Voiture = $_POST['Voiture'];
		$ID_Voiture = $_POST['ID_Voiture'];
		$NbJour = $_POST['NbJour'];
		$Date_Location = $_POST['Date_Location'];
		$sql = "UPDATE table_louer SET LocataireLouer = '$Locataire', ID_Locataire = '$ID_Locataire',  VoitureLouer = '$Voiture', ID_Voiture = '$ID_Voiture', NbJour = '$NbJour', Date_Location = '$Date_Location' WHERE ID_Louer = '$ID_Louer'";

		$bdd->query($sql);
	}
	header('Location: ../table_louer/louerListe.php');

?>