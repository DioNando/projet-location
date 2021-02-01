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
                            include_once('../connexion/connexion.php');
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
                            ?>
                                    <tr>
                                    <th scope="row"> <?php echo htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']) ?> </th>
                                    <th scope="row"> <?php echo htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) ?> </th>
                                    <td> <?php echo htmlspecialchars($donnees['NbJour']) ?></td>  
                                    <td> <?php echo htmlspecialchars($donnees['Date_Location']) ?> </td>
                                    <td>
                                    <center>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalLouer" onclick="updateData('<?php echo $donnees['Locataire']; ?>' , '<?php echo $donnees['Voiture']; ?>' , '<?php echo $donnees['NbJour']; ?>' , '<?php echo $donnees['Date_Location']; ?>')"><img
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