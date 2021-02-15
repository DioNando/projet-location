<?php include("connexion/connexion.php"); 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="icons/favicon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Acc.css">
    <link rel="stylesheet" href="css/TeslaServices.css">
    <link rel="stylesheet" href="css/TeslaAvis.css">
    <link rel="stylesheet" href="@fortawesome/fontawesome-free/css/all.min.css" type="text/css">



    <title>Accueil - Tesla</title>
    <style>
        body {
            /* background-image: linear-gradient(180deg, #FFFFFF, #C1E6FF); */
            background-image: url("images/fond.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        header {
            
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="container main">
            <div class="welcome_top_container">
                <img src="images/<?=$_SESSION["Username"]?>.jpg" alt="Avatar"  heigth="170" width="170" class="avatar">
                <p class="welcome_txt">
                    <?php 
                    if(isset($_SESSION["Username"])){
                        echo('Bonjour '.$_SESSION["Username"].'!');
                    }
                    ?>
                </p>
            </div>
            <div>
                <p class="welcome_1_container">Qu'est-ce que vous souhaiteriez faire ?</p>
                <?php include("Services.php")?>
            </div> 


            <div class="row aperçu">
                <div class="col-6">
                    <p class="welcome_middle_container">Aperçu de l'histogramme du table louer :</p>
                    <div class="mt-3">
                        <img src="main/histogrammeVoiture.php" id="histogramme" class="aperçu_histo" heigth="100%" width="100%">
                    </div>
                </div>
                <div class="col-5 droite_histo">
                    <p class="white">Interpretation:</p>
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

                </div>
                <div class="avis_clients">
                <p class="welcome_1_container">Derniers avis venant des clients :</p>
                <?php include("Avis.php")?>
                </div> 


            </div>

        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



</html>