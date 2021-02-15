<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['ID_Locataire'])){
		$ID_Locataire = $_POST['ID_Locataire'];
		$sql = "DELETE FROM table_locataire WHERE ID_Locataire = '$ID_Locataire'";

		$bdd->query($sql);
	}

	header('Location: ../table_locataire/locataireListe.php');
?>