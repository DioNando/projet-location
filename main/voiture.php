<?php include("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../icons/favicon.png"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Location par voiture</title>
    <style>
        body {
            background-image: url("../images/background.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="container main">
            <div class="row">
                <article class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <h4><a href="#">Effectif et Montant total des locations par voiture</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <?php include("../recherche/rechercheDate.php"); ?>
                    <!-- Tableau -->
                    <table class="table table-hover table-light table-striped" id="result">
                        <thead>
                            <tr>
                                <th scope="col">Voiture</th>
                                <th scope="col">Effectif</th>
                                <th scope="col">Montant</th>                                
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php 

                            if (isset($_POST['search'])) {
                                $searchkey = $_POST['search'];
                                $sql = "SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer 
                                    WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                    (CONCAT(Voiture, ' ', table_louer.ID_Voiture) LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%') GROUP BY table_louer.ID_Voiture";
                            }else{
                                $sql = "SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) GROUP BY table_louer.ID_Voiture";
                            } ?>

                            <?php
                            if (isset($_POST['searchDebut']) || isset($_POST['searchFin'])) {
                                $searchkeyDebut = $_POST['searchDebut'];
                                $searchkeyFin = $_POST['searchFin'];
                                $sql = "SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer 
                                    WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                    (Date_Location BETWEEN '$searchkeyDebut' AND '$searchkeyFin') GROUP BY table_louer.ID_Voiture";                                
                               
                                 }else{
                                    $sql = "SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) GROUP BY table_louer.ID_Voiture";

                                } ?>

                            <?php
                            $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                                    echo '<tr><th scope="row">' . htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) . '</th>';  
                                    echo '<td>' . htmlspecialchars($donnees['Effectif']) . '</td>';
                                    echo '<td>' . htmlspecialchars($donnees['Total']) . '</td>';
                                                                         
                                }

                               
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

<script src="../jquery/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="rechercheVoiture.js"></script>

</html>