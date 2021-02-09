              <table class="table align-items-center table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 
                      include_once('../connexion/connexion.php');

                      if (isset($_POST['search'])) {
                          $searchkey = $_POST['search'];
                          $sql = "SELECT * FROM table_locataire WHERE CONCAT(Locataire, ' ', ID_Locataire) LIKE '%$searchkey%' OR Nom LIKE '%$searchkey%' OR Adresse LIKE '%$searchkey%'"; 
                      }else{
                          $sql = "SELECT * FROM table_locataire";
                      }

                      $reponse = $bdd->query($sql);

                          while ($donnees = $reponse->fetch())
                          {
                              echo 
                                  "<tr>
                                    <td>". htmlspecialchars($donnees['Locataire']) . " " . htmlspecialchars($donnees['ID_Locataire']) ."</td>
                                    <td>". htmlspecialchars($donnees['Nom']) ."</td>
                                    <td>". htmlspecialchars($donnees['Adresse']) ."</td>
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