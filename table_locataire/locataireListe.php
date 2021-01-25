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


                        <form action="../traitement/locataire_post.php" method="POST">
                            <div class="mb-2">
                                <label for="exampleInputID1" class="form-label">Numéro locataire</label>
                                <input type="text" class="form-control" id="exampleInputID1" name="Locataire">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputName1" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="Nom">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputAdress1" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="exampleInputAdress1" name="Adresse">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>

                    </div>

                </article>

                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des locataires</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <!--<th scope="col">Locataire</th>-->
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php 

                                $reponse = $bdd->query('SELECT * FROM table_locataire');

                                    while ($donnees = $reponse->fetch())
                                    {
                                        echo '<tr><th scope="row">' . htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']) . '</th>';
                                        /*echo '<td>' . htmlspecialchars($donnees['Locataire']) . '</td>';*/
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

</html>