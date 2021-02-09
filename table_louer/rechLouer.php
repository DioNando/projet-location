            <table class="table align-items-center table-dark table-flush" id="result">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Locataire</th>
                    <th scope="col">Voiture</th>
                    <th scope="col">Nombre de jour</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
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
                              echo 
                                  "<tr>
                                    <td>". htmlspecialchars($donnees['Locataire']) . " " . htmlspecialchars($donnees['ID_Locataire']) ."</td>
                                    <td>". htmlspecialchars($donnees['Voiture']) . " " . htmlspecialchars($donnees['ID_Voiture']) ."</td>
                                    <td>". htmlspecialchars($donnees['NbJour']) ."</td>
                                    <td>". htmlspecialchars($donnees['Date_Location']) ."</td>
                                    <td>
                                      <a href='#modif_".$donnees['ID_Locataire']."' class='btn btn-info btn-sm' data-toggle='modal'><i class='fas fa-edit'></i></a>
                                      <a href='#suppr_".$donnees['ID_Locataire']."' class='btn btn-danger btn-sm' data-toggle='modal'><i class='fas fa-trash'></i></a>
                                    </td>
                                  </tr>";
                                  include('modal/Modif_Supp_modal.php');   
                          }

                      $reponse->closeCursor();
                ?>
                </tbody>
              </table>