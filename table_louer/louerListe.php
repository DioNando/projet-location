<?php include("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../icons/favicon.png"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Louer</title>
    <style>
        body {
            background-image: url("../images/background4.png");
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
                <!-- Formulaire -->
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">

                    <div class="accordion accordion-flush" id="accordionFlushLouer">
                        <div class="accordion-item">
                            <h2 class="accordion-header bg-light" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <h4><a href="#" class="align-middle">Nouveau</a></h4>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushLouer">
                                <div class="accordion-body">

                                    <div class="container-fluid bg-light formulaire">
                                        <form action="../traitement/louer_post.php" method="POST">

                                            <div class="mb-2">
                                                <label for="#" class="form-label">Identifiant locataire</label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="#" name="Locataire"
                                                            autocomplete="off" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="number" class="form-control" id="#"
                                                            name="ID_Locataire" autocomplete="off" min="1" required>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-2">
                                                <label for="#" class="form-label">Identification voiture</label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="#" name="Voiture"
                                                            autocomplete="off" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="number" class="form-control" id="#"
                                                            name="ID_Voiture" autocomplete="off" min="1" required>
                                                    </div>

                                                </div>
                                                <div class="mb-2">
                                                    <label for="#" class="form-label">Nombre de jour</label>
                                                    <input type="number" class="form-control" id="#" name="nb_Jour"
                                                        autocomplete="off" min="1" value="1">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="#" class="form-label">Date de location</label>
                                                    <input type="date" class="form-control" id="#" name="date_Location">
                                                </div>

                                                <div class="d-grid gap-2 mt-4">
                                                    <button type="submit" class="btn btn-primary"
                                                        id="#">Valider</button>
                                                </div>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header bg-light" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <h4><a href="#" class="align-middle">Liste des locataires</a></h4>
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <?php include("../recherche/rechercheMiniLocataire.php"); ?>
                                    <div class="row">
                                        <article class="col-12">
                                            <table class="table table-hover table-light table-striped" id="resultMiniLocataire">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Identifiant</th>
                                                        <th scope="col">Nom</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="align-middle">
                                                    <?php 

                                if (isset($_POST['search'])) {
                                    $searchkey = $_POST['search'];
                                    $sql = "SELECT * FROM table_locataire WHERE CONCAT(Locataire,' ', ID_Locataire) LIKE '%$searchkey%' OR Nom LIKE '%$searchkey%' ORDER BY ID_Locataire DESC"; 
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
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header bg-light" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    <h4><a href="#" class="align-middle">Liste des voitures</a></h4>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <?php include("../recherche/rechercheMiniVoiture.php"); ?>
                                    <div class="row">
                                        <article class="col-12">
                                        
                                            <table class="table table-hover table-light table-striped" id="resultMiniVoiture">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Identification</th>
                                                        <th scope="col">Désignation</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="align-middle">
                                                    <?php 

                                if (isset($_POST['searchMiniVoiture'])) {
                                    $searchkey = $_POST['searchMiniVoiture'];
                                    $sql = "SELECT * FROM table_voiture WHERE CONCAT(Voiture,' ', ID_Voiture) LIKE '%$searchkey%' OR Designation LIKE '%$searchkey%'";
                                }else{
                                    $sql = "SELECT * FROM table_voiture";
                                }

                                $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                            ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']); ?>
                                                        </th>

                                                        <td> <?php echo htmlspecialchars($donnees['Designation']); ?>
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
                        </div>


                    </div>



                </article>
                <!-- Liste -->
                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des locations</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <!-- Tableau -->
                    <table class="table table-hover table-light table-striped" id="result">
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
                                $sql = "SELECT * FROM table_louer 
                                    WHERE (CONCAT(LocataireLouer, ' ', ID_Locataire) LIKE '%$searchkey%' OR CONCAT(VoitureLouer, ' ', ID_Voiture) LIKE '%$searchkey%' OR NBJour LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%')";
                            }else{
                                $sql = "SELECT * FROM table_louer";
                            }

                            $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())

                                {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo htmlspecialchars($donnees['LocataireLouer']) . ' ' . htmlspecialchars($donnees['ID_Locataire']) ?>
                                </th>
                                <th scope="row">
                                    <?php echo htmlspecialchars($donnees['VoitureLouer']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) ?>
                                </th>
                                <td> <?php echo htmlspecialchars($donnees['NbJour']) ?></td>
                                <td> <?php echo htmlspecialchars($donnees['Date_Location']) ?> </td>
                                <td>
                                    <center>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary pencil" data-bs-toggle="modal"
                                                data-bs-target="#modalLouer"
                                                onclick="updateData('<?php echo $donnees['ID_Louer']; ?>' , '<?php echo $donnees['LocataireLouer']; ?>' , '<?php echo $donnees['ID_Locataire']; ?>' , '<?php echo $donnees['VoitureLouer']; ?>' , '<?php echo $donnees['ID_Voiture']; ?>' , '<?php echo $donnees['NbJour']; ?>' , '<?php echo $donnees['Date_Location']; ?>')"><img
                                                    src="../icons/pencil-fill.svg" alt=""></button>
                                                    <button type="button" class="btn btn-secondary eraser" data-bs-toggle="modal"
                                                data-bs-target="#modalVoitureDelete"
                                                onclick="deleteData('<?php echo $donnees['ID_Louer']; ?>')" ><img src="../icons/eraser-fill.svg" alt=""></button>
                                        </div>
                                    </center>
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

<?php include("../modal/modalLouer.php"); ?>

<script type="text/javascript">
    function updateData(ID_Louer, Locataire, ID_Locataire, Voiture, ID_Voiture, NbJour, Date_Location) {
        document.getElementById('inputID_Louer').value = ID_Louer;
        document.getElementById('inputLocataire').value = Locataire;   
        document.getElementById('inputID_Locataire').value = ID_Locataire;
        document.getElementById('inputVoiture').value = Voiture;
        document.getElementById('inputID_Voiture').value = ID_Voiture;
        document.getElementById('inputNbJour').value = NbJour;
        document.getElementById('inputDate').value = Date_Location;
        document.getElementById('btnSubmit').value = "Valider";
    }

    function deleteData(ID_Louer) {
        document.getElementById('inputIDdel').value = ID_Louer;
        document.getElementById('btnDelete').value = "Effacer";
    }
</script>

<script src="../jquery/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="recherche.js"></script>
<script src="rechercheMiniVoiture.js"></script>
<script src="rechercheMiniLocataire.js"></script>


</html>