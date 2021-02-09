        <table class="table align-items-center table-dark table-flush" id="result">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Voiture</th>
                    <th scope="col">Effectif</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 
                      include_once('../connexion/connexion.php');
                      if (isset($_POST['search'])) {
                           $searchkey = $_POST['search'];
                           $sql = "SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer 
                                    WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                    (CONCAT(Voiture, ' ', table_louer.ID_Voiture) LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%') GROUP BY table_louer.ID_Voiture"; 
                      }else{
                          $sql = "SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) GROUP BY table_louer.ID_Voiture";
                      }

                      $reponse = $bdd->query($sql);

                          while ($donnees = $reponse->fetch())
                          {
                              echo 
                                  "<tr>
                                    <td>". htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) ."</td>
                                    <td>". htmlspecialchars($donnees['Effectif']) ."</td>
                                    <td>". htmlspecialchars($donnees['Total']) ."</td>
                                  </tr>";
                          }

                      $reponse->closeCursor();
                ?>
                </tbody>
              </table>