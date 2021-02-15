<?php
	include_once('../connexion/connexion.php');

	if(isset($_POST['ID_Louer'])){
		$ID_Louer = $_POST['ID_Louer'];
		$sql = "DELETE FROM table_louer WHERE ID_Louer = '$ID_Louer'";

		$bdd->query($sql);
	}

	header('Location: ../table_louer/louerListe.php');
?>