<table class="table table-hover table-dark table-striped">
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
                                    $sql = "SELECT * FROM table_locataire WHERE CONCAT(Locataire, ' ', ID_Locataire) LIKE '%$searchkey%' OR Nom LIKE '%$searchkey%' OR Adresse LIKE '%$searchkey%' ORDER BY ID_Locataire DESC"; 
                                }else{
                                    $sql = "SELECT * FROM table_locataire ORDER BY ID_Locataire DESC";
                                }

                                $reponse = $bdd->query($sql);

                                    while ($donnees = $reponse->fetch())
                                    {
                                        echo '<tr><th scope="row">' . htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']) . '</th>';
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