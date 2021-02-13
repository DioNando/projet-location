<table class="table table-hover table-light table-striped" id="resultMiniVoiture">
    <thead>
        <tr>
            <th scope="col">Identification</th>
            <th scope="col">Désignation</th>

        </tr>
    </thead>
    <tbody class="align-middle">
        <?php 
                                include_once('../connexion/connexion.php');

                                if (isset($_POST['search'])) {
                                    $searchkey = $_POST['search'];
                                    $sql = "SELECT * FROM table_voiture WHERE CONCAT(Voiture,' ', ID_Voiture) LIKE '%$searchkey%' OR Designation LIKE '%$searchkey%'";
                                }else{
                                    $sql = "SELECT * FROM table_voiture";
                                }

                                $reponse = $bdd->query($sql);

                                while ($donnees = $reponse->fetch())
                                {
                            ?>
        <tr>
            <th scope="row">
                <?php echo htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']); ?>
            </th>

            <td> <?php echo htmlspecialchars($donnees['Designation']); ?>
            </td>

        </tr>
        <?php    
                                }

                                $reponse->closeCursor();
                            ?>
    </tbody>
</table>