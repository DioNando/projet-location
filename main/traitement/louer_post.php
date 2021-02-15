<?php
include("../connexion/connexion.php");

$req = $bdd->prepare('INSERT INTO table_louer (LocataireLouer, ID_Locataire, VoitureLouer, ID_Voiture, NBJour, Date_Location) VALUES (?,?,?,?,?,?)');
$req->execute(array($_POST['Locataire'], $_POST['ID_Locataire'], $_POST['Voiture'], $_POST['ID_Voiture'], $_POST['nb_Jour'], $_POST['date_Location']));

header('Location: ../table_louer/louerListe.php');

?>

