<table class="table table-hover table-light table-striped" id="resultMiniLocataire">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Identifiant</th>
                                                        <th scope="col">Nom</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="align-middle">
                                                    <?php 
                                 include_once('../connexion/connexion.php');
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
