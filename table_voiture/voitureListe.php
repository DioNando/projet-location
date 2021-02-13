<?php include("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Voitures</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="container main">
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header bg-light" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h4><a href="#" class="align-middle">Nouveau</a></h4>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"><div class="container-fluid bg-light formulaire">
                        <form action="../traitement/voiture_post.php" method="POST">
                            <div class="mb-2">
                                <label for="#" class="form-label">Identification voiture</label>
                                <input type="text" class="form-control" id="#" name="Voiture" autocomplete="off">
                            </div>
                            <div class="mb-2">
                                <label for="#" class="form-label">Désignation</label>
                                <input type="text" class="form-control" id="#" name="Designation" autocomplete="off">
                            </div>
                            <div class="mb-2">
                                <label for="#" class="form-label">Loyer journalier</label>
                                <input type="number" class="form-control" id="#" name="Loyer_Journalier" autocomplete="off" min="0">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary" id="#">Valider</button>
                            </div>
                        </form>

                    </div>
                </div>
                    </div>
                </div>


            </div>

                    
                    
                </article>

                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des voitures</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <table class="table table-hover table-light table-striped" id="result">
                        <thead>
                            <tr>
                                <th scope="col">Identification</th>                        
                                <th scope="col">Désignation</th>
                                <th scope="col">Loyer journalier</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                             <?php 

                                if (isset($_POST['search'])) {
                                    $searchkey = $_POST['search'];
                                    $sql = "SELECT * FROM table_voiture WHERE CONCAT(Voiture,' ', ID_Voiture) LIKE '%$searchkey%' OR Designation LIKE '%$searchkey%' OR Loyer LIKE '%$searchkey%'";
                                }else{
                                    $sql = "SELECT * FROM table_voiture";
                                }

                                $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                            ?>
                                    <tr>
                                    <th scope="row"> <?php echo htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']); ?> </th>
                                   
                                    <td> <?php echo htmlspecialchars($donnees['Designation']); ?> </td>  
                                    <td> <?php echo htmlspecialchars($donnees['Loyer']);  ?> </td> 
                                    <td>
                                    <center>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalVoiture" onclick="updateData('<?php echo $donnees['ID_Voiture']; ?>' , '<?php echo $donnees['Voiture']; ?>' , '<?php echo $donnees['Designation']; ?>' , '<?php echo $donnees['Loyer']; ?>')"><img
                                                    src="../icons/pencil-fill.svg" alt=""></button>
                                            <button type="button" class="btn btn-secondary"  data-bs-toggle="modal"
                                                data-bs-target="#modalVoitureDelete" onclick="deleteData('<?php echo $donnees['ID_Voiture']; ?>')"><img
                                                    src="../icons/eraser-fill.svg" alt=""></button>
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


</body>

<?php include("../modal/modalVoiture.php"); ?>

<script type="text/javascript">
    function updateData(ID_Voiture, Voiture, Designation, Loyer)
    {
        document.getElementById('inputID').value = ID_Voiture;
        document.getElementById('inputVoiture').value = Voiture;
        document.getElementById('inputDesignation').value = Designation;
        document.getElementById('inputLoyer').value = Loyer;
        document.getElementById('btnSubmit').value = "Valider";
    }
</script>

<script src="../jquery/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="recherche.js"></script>

</html>