<?php include("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../icons/favicon.png"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleModal.css">
    <title>Locataires</title>
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
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">


                    <div class="accordion accordion-flush" id="accordionFlushLocataire">
                        <div class="accordion-item">
                            <h2 class="accordion-header bg-light" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <h4><a href="#" class="align-middle">Nouveau</a></h4>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushLocataire">
                                <div class="accordion-body">

                                    <div class="container-fluid bg-light formulaire">
                                        <form action="../traitement/locataire_post.php" method="POST">
                                            <div class="mb-2">
                                                <label for="#" class="form-label">Identifiant locataire</label>
                                                <input type="text" class="form-control" id="#" name="Locataire" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="#" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="#" name="Nom" autocomplete="off" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="#" class="form-label">Adresse</label>
                                                <input type="text" class="form-control" id="#" name="Adresse" autocomplete="off" required>
                                            </div>

                                            <div class="d-grid gap-2 mt-4">
                                                <button type="submit" class="btn btn-primary" id="#">Valider</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>


                </article>

                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des locataires</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <table class="table table-hover table-light table-striped" id="result">
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
                                    $sql = "SELECT * FROM table_locataire WHERE CONCAT(Locataire,' ', ID_Locataire) LIKE '%$searchkey%' OR Nom LIKE '%$searchkey%' OR Adresse LIKE '%$searchkey%' ORDER BY ID_Locataire DESC"; 
                                }else{
                                    $sql = "SELECT * FROM table_locataire ORDER BY ID_Locataire DESC";
                                }

                                $reponse = $bdd->query($sql);

                                    while ($donnees = $reponse->fetch())
                                    {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']); ?>
                                </th>
                                <td> <?php echo htmlspecialchars($donnees['Nom']); ?> </td>
                                <td> <?php echo htmlspecialchars($donnees['Adresse']); ?> </td>
                                <td>
                                    <div class="center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary pencil" data-bs-toggle="modal"
                                                data-bs-target="#modalLocataire"
                                                onclick="updateData('<?php echo $donnees['ID_Locataire']; ?>' , '<?php echo $donnees['Locataire']; ?>' , '<?php echo $donnees['Nom']; ?>' , '<?php echo $donnees['Adresse']; ?>')"><img
                                                    src="../icons/pencil-fill.svg" alt=""></button>                                                    
                                                    <button type="button" class="btn btn-secondary eraser" data-bs-toggle="modal"
                                                data-bs-target="#modalLocataireDelete"
                                                onclick="deleteData('<?php echo $donnees['Locataire']; ?>' , '<?php echo $donnees['ID_Locataire']; ?>')" ><img src="../icons/eraser-fill.svg" alt=""></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php 
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

<?php include("../modal/modalLocataire.php"); ?>

<script type="text/javascript">
    function updateData(ID_Locataire, Locataire, Nom, Adresse) {
        document.getElementById('inputID').value = ID_Locataire;
        document.getElementById('inputLocataire').value = Locataire;
        document.getElementById('inputNom').value = Nom;
        document.getElementById('inputAdresse').value = Adresse;
        document.getElementById('btnSubmit').value = "Valider";
    }

    function deleteData(Locataire, ID_Locataire) {
        document.getElementById('innerLocDel').innerHTML = Locataire;
        document.getElementById('innerIDdel').innerHTML = ID_Locataire;
        document.getElementById('inputIDdel').value = ID_Locataire;
        document.getElementById('btnDelete').value = "Effacer";
    }
</script>

<script src="../jquery/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="recherche.js"></script>

</html>