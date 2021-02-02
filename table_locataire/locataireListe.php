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
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h4><a href="#">Nouveau</a></h4>
                    <div class="container-fluid bg-dark formulaire">

                        <form action="edit.php" method="POST">
                            <?php

                                $Locataire = '';
                                $Nom = '';
                                $Adresse = '';

                            ?>
                            <div class="mb-2">
                                <label for="exampleInputID1" class="form-label">Numéro locataire</label>
                                <input type="text" class="form-control" id="exampleInputID1" name="Locataire" value="<?php echo $Locataire; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputName1" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="Nom" value="<?php echo $Nom; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputAdress1" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="exampleInputAdress1" name="Adresse" value="<?php echo $Adresse; ?>">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" name="Valider" class="btn btn-primary">Valider</button>
                            </div>
                        </form>

                    </div>

                </article>

                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des locataires</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <table class="table table-hover table-dark table-striped" id="result">
                        <thead>
                            <tr>
                                <th scope="col">Identifiant</th>                   
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php 

                                if (isset($_POST['search'])) {
                                    $searchkey = $_POST['search'];
                                    $sql = "SELECT * FROM table_locataire WHERE CONCAT(Locataire, ' ', ID_Locataire) LIKE '%$searchkey%' OR Nom LIKE '%$searchkey%' OR Adresse LIKE '%$searchkey%'"; 
                                }else{
                                    $sql = "SELECT * FROM table_locataire";
                                }

                                $reponse = $bdd->query($sql);

                                    while ($donnees = $reponse->fetch())
                                    {
                                        echo '<tr><th scope="row">' . htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']) . '</th>';
                                        echo '<td>' . htmlspecialchars($donnees['Nom']) . '</td>';  
                                        echo '<td>' . htmlspecialchars($donnees['Adresse']) . '</td>'; 
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