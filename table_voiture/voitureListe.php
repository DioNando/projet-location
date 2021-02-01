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
                    <h4><a href="#">Nouveau</a></h4>
                    <div class="container-fluid bg-dark formulaire">
                        <form action="../traitement/voiture_post.php" method="POST">
                            <div class="mb-2">
                                <label for="inputVoiture" class="form-label">Numéro voiture</label>
                                <input type="text" class="form-control" id="inputVoiture" name="Voiture">
                            </div>
                            <div class="mb-2">
                                <label for="inputDesignation" class="form-label">Désignation</label>
                                <input type="text" class="form-control" id="inputDesignation" name="Designation">
                            </div>
                            <div class="mb-2">
                                <label for="inputLoyer" class="form-label">Loyer journalier</label>
                                <input type="number" class="form-control" id="inputLoyer" name="Loyer_Journalier">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Valider</button>
                            </div>
                        </form>

                    </div>
                </article>

                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des voitures</a></h4>
                    <?php include("../recherche/recherche.php"); ?>
                    <table class="table table-hover table-dark table-striped" id="result">
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
                                            <button type="button" class="btn btn-primary" onclick="updateData('<?php echo $donnees['Voiture']; ?>' , '<?php echo $donnees['Designation']; ?>' , '<?php echo $donnees['Loyer']; ?>')"><img
                                                    src="../icons/pencil-fill.svg" alt=""></button>
                                            <button type="button" class="btn btn-secondary"><img
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
<script type="text/javascript">
    function updateData(Voiture, Designation, Loyer)
    {
        document.getElementById('inputVoiture').value = Voiture;
        document.getElementById('inputDesignation').value = Designation;
        document.getElementById('inputLoyer').value = Loyer;
        document.getElementById('btnSubmit').value = "Valider";
    }

</script>

<script src="../jquery/jquery.min.js"></script>
<script src="recherche.js"></script>

</html>