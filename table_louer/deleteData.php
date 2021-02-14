<?php
    include_once("../connexion/connexion.php");

    if(isset($_GET['ID_Locataire']) || isset($_GET['ID_Voiture'])) {
        $ID_Locataire = $_GET['ID_Locataire'];
        $ID_Voiture = $_GET['ID_Voiture'];
        $sql = "DELETE FROM table_louer WHERE ID_Locataire = '$ID_Locataire' OR ID_Voiture = '$ID_Voiture'";

        $bdd->query($sql);
    }

    header('Location : louerListe.php');
?>