  
<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['modifier'])){
		$ID_Voiture = $_POST['ID_Voiture'];
		$Voiture = $_POST['Voiture'];
		$Designation = $_POST['Designation'];
		$Loyer = $_POST['Loyer_Journalier'];
		$sql = "UPDATE table_voiture SET Voiture = '$Voiture', Designation = '$Designation', Loyer = '$Loyer' WHERE ID_Voiture = '$ID_Voiture'";

		$bdd->query($sql);
	}
	header('Location: ../table_voiture/voitureListe.php');

?>