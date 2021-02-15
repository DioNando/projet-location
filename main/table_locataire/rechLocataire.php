<table class="table table-hover table-light table-striped">
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
                                include_once("../connexion/connexion.php");
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
                                    <center>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary pencil" data-bs-toggle="modal"
                                                data-bs-target="#modalLocataire"
                                                onclick="updateData('<?php echo $donnees['ID_Locataire']; ?>' , '<?php echo $donnees['Locataire']; ?>' , '<?php echo $donnees['Nom']; ?>' , '<?php echo $donnees['Adresse']; ?>')"><img
                                                    src="../icons/pencil-fill.svg" alt=""></button>                                                    
                                                    <button type="button" class="btn btn-secondary eraser" data-bs-toggle="modal"
                                                data-bs-target="#modalLocataireDelete"
                                                onclick="deleteData('<?php echo $donnees['Locataire']; ?>' , '<?php echo $donnees['ID_Locataire']; ?>')" ><img src="../icons/eraser-fill.svg" alt=""></button>
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