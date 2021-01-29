<table class="table table-hover table-dark table-striped">
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
                                include_once("../connexion/connexion.php");
                                if (isset($_POST['search'])) {
                                    $searchkey = $_POST['search'];
                                    $sql = "SELECT * FROM table_voiture WHERE CONCAT(Voiture,' ', ID_Voiture) LIKE '%$searchkey%' OR Designation LIKE '%$searchkey%' OR Loyer LIKE '%$searchkey%'";
                                }else{
                                    $sql = "SELECT * FROM table_voiture";
                                }

                                $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                                    echo '<tr><th scope="row">' . htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) . '</th>';
                                    /*echo '<td>' . htmlspecialchars($donnees['Voiture']) . '</td>';*/
                                    echo '<td>' . htmlspecialchars($donnees['Designation']) . '</td>';  
                                    echo '<td>' . htmlspecialchars($donnees['Loyer']) . '</td>'; 
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