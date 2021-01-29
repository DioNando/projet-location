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