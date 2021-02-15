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
                            include_once('../connexion/connexion.php');
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