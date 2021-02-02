<?php
	$Locataire = '';
	$Nom = '';
	$Adresse = '';

	if(isset($_POST['edit'])){
		$Locataire = $_POST['Locataire'];
		$Nom = $_POST['Nom'];
		$Adresse = $_POST['Adresse'];
		$sql = "UPDATE table_locataire SET Nom = '$Nom', Adresse = '$Adresse' WHERE CONCAT(Locataire, ' ', ID_Locataire) = '$Locataire'";

		$bdd->query($sql);
	}
	header('Location: ../table_locataire/locataireListe.php');
?>