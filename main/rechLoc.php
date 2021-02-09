<table class="table align-items-center table-dark table-flush" id="result">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Locataire</th>
                    <th scope="col">Date location</th>
                    <th scope="col">Loyer journalier</th>
                    <th scope="col">Nombre de jour</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 
                      include_once('../connexion/connexion.php');
                      if (isset($_POST['search'])) {
                          $searchkey = $_POST['search'];
                          $sql = "SELECT *, DATE_FORMAT(Date_Location, '%d %b %Y') AS Date_Location, (Loyer*NbJour) AS Montant FROM table_locataire, table_voiture, table_louer 
                                WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                (Nom LIKE '%$searchkey%' OR NBJour LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%') ORDER BY Nom";
                                
                          $total = $bdd->query("SELECT SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer
                                  WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) AND
                                  (Nom LIKE '%$searchkey%' OR NBJour LIKE '%$searchkey%' OR Date_Location LIKE '%$searchkey%')");
                      }else{
                          $sql = "SELECT *, DATE_FORMAT(Date_Location, '%d %b %Y') AS Date_Location, (Loyer*NbJour) AS Montant FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) ORDER BY Nom";
                            
                          $total = $bdd->query('SELECT SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture)');
                            }

                      $reponse = $bdd->query($sql);

                          while ($donnees = $reponse->fetch())
                          {
                              echo 
                                  "<tr>
                                    <td>". htmlspecialchars($donnees['Nom']) ."</td>
                                    <td>". htmlspecialchars($donnees['Date_Location']) ."</td>
                                    <td>". htmlspecialchars($donnees['Loyer']) ."</td>
                                    <td>". htmlspecialchars($donnees['NbJour']) ."</td>
                                    <td>". htmlspecialchars($donnees['Montant']) ."</td>
                                  </tr>";   
                          }

                          while ($donnees = $total->fetch()) {
                                  echo '<tr class="bg-dark">
                                  <th colspan="4">TOTAL</th>
                                  <th>' . $donnees['Total']. '</th></tr>';
                          }

                      $total->closeCursor();
                      $reponse->closeCursor();
                ?>
                </tbody>
              </table>