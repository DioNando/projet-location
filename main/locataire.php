<?php include("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Location</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="container main">
            <div class="row">
                <article class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <h4><a href="#">Liste des locataires</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <!-- Tableau -->
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Locataire</th>
                                <th scope="col">Date location</th>
                                <th scope="col">Loyer journalier</th>
                                <th scope="col">Nombre de jour</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php 

                            if (isset($_POST['search'])) {
                                $searchkey = $_POST['search'];
                                $sql = "SELECT *, (Loyer*NbJour) AS Montant FROM table_locataire, table_voiture, table_louer 
                                    WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                    (Nom LIKE '%$searchkey%' OR NBJour LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%') ORDER BY Date_Location DESC";
                                
                                $somme = $bdd->query("SELECT SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer
                                    WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                    (Nom LIKE '%$searchkey%' OR NBJour LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%')");
                            }else{
                                $sql = "SELECT *, (Loyer*NbJour) AS Montant FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) ORDER BY Date_Location DESC";
                            
                                $somme = $bdd->query('SELECT SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture)');
                            }

                            $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                                    echo '<tr><td>' . htmlspecialchars($donnees['Nom']) . '</td>';
                                    echo '<td>' . htmlspecialchars($donnees['Date_Location']) . '</td>';
                                    echo '<td>' . htmlspecialchars($donnees['Loyer']) . '</td>';
                                    echo '<td>' . htmlspecialchars($donnees['NbJour']) . '</td>';  
                                    echo '<td>' . htmlspecialchars($donnees['Montant']) . '</td></tr>';                                      
                                }

                                while ($donnees = $somme->fetch()) {
                                    echo '<tr class="bg-light">
                                    <th colspan="4">TOTAL</th>
                                    <th>' . $donnees['Total']. '</th></tr>';
                                }   

                                $somme->closeCursor();
                                $reponse->closeCursor();
                            ?>
                            
                        </tbody>
                    </table>
                </article>

                
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>