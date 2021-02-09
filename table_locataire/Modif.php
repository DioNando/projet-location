<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['modifier'])){
		$ID_Locataire = $_POST['ID_Locataire'];
		$Locataire = $_POST['Locataire'];
		$Nom = $_POST['Nom'];
		$Adresse = $_POST['Adresse'];
		$sql = "UPDATE table_locataire SET Locataire = '$Locataire', Nom = '$Nom', Adresse = '$Adresse' WHERE ID_Locataire = '$ID_Locataire'";

		$bdd->query($sql);
	}
	header('Location: locataireListe.php');

?>
