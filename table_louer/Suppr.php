<?php
	include_once('../connexion/connexion.php');

	if(isset($_GET['ID_Locataire'])){
		$sql = "DELETE FROM table_locataire WHERE ID_Locataire = '".$_GET['ID_Locataire']."'";

		$bdd->query($sql);
	}

	header('Location: locataireListe.php');
?>