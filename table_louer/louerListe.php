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
                <!-- Formulaire -->
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h4><a href="#">Nouveau</a></h4>
                    <div class="container-fluid bg-dark formulaire">
                        <form action="../traitement/louer_post.php" method="POST">
                            
                            <div class="mb-2">
                            <label for="exampleInputID1" class="form-label">Numéro locataire</label>
                            <select class="form-select" aria-label="Default select example" name="ID_Locataire">

                            <?php 

                            $reponse = $bdd->query('SELECT * FROM table_locataire ORDER BY ID_Locataire DESC LIMIT 5');

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                                    <option value="<?php echo $donnees['ID_Locataire'] ?>"> <?php echo htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']); ?> </option>
                                <?php
                                }

                                $reponse->closeCursor();
                            ?>
                                
                            </select>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputID1" class="form-label">Numéro voiture</label>
                                <select class="form-select" aria-label="Default select example" name="ID_Voiture">

                            <?php 

                            $reponse = $bdd->query('SELECT * FROM table_voiture');

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                                    <option value="<?php echo $donnees['ID_Voiture'] ?>"> <?php echo htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']); ?> </option>
                                <?php
                                }

                                $reponse->closeCursor();
                            ?>
                                
                            </select>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputName1" class="form-label">Nombre de jour</label>
                                <input type="number" class="form-control" id="exampleInputName1" name="nb_Jour">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputAdress1" class="form-label">Date de location</label>
                                <input type="date" class="form-control" id="exampleInputAdress1" name="date_Location">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>

                    </div>
                </article>
                <!-- Liste -->
                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des locations</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <!-- Tableau -->
                    <table class="table table-hover table-dark table-striped" id="result">
                        <thead>
                            <tr>
                                <th scope="col">Locataire</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Nombre de jour</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php 

                            if (isset($_POST['search'])) {
                                $searchkey = $_POST['search'];
                                $sql = "SELECT * FROM table_locataire, table_voiture, table_louer 
                                    WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                    (CONCAT(Locataire, ' ',table_louer.ID_Locataire) LIKE '%$searchkey%' OR CONCAT(Voiture, ' ', table_louer.ID_Voiture) LIKE '%$searchkey%' OR NBJour LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%')";
                            }else{
                                $sql = "SELECT * FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture)";
                            }

                            $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                                    echo '<tr><th scope="row">' . htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']) . '</th>';
                                    echo '<th scope="row">' . htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) . '</th>';
                                    echo '<td>' . htmlspecialchars($donnees['NbJour']) . '</td>';  
                                    echo '<td>' . htmlspecialchars($donnees['Date_Location']) . '</td>'; 
                                    echo '<td>
                                    <center>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><img
                                                    src="../icons/pencil-fill.svg" alt=""></button>
                                            <button type="button" class="btn btn-secondary"><img
                                                    src="../icons/eraser-fill.svg" alt=""></button>
                                        </div>
                                    </center>
                                    </td></tr>';    
                                }

                                $reponse->closeCursor();
                            ?>

                        </tbody>
                    </table>
                </article>
            </div>
        </div>
    </div>



</body>
<script src="../jquery/jquery.min.js"></script>
<script src="recherche.js"></script>


</html>