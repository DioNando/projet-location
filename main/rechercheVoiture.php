<table class="table table-hover table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Voiture</th>
            <th scope="col">Effectif</th>
            <th scope="col">Montant</th>
        </tr>
    </thead>
    <tbody class="align-middle">
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
                                    echo '<tr><th scope="row">' . htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']) . '</th>';  
                                    echo '<td>' . htmlspecialchars($donnees['Effectif']) . '</td>';
                                    echo '<td>' . htmlspecialchars($donnees['Total']) . '</td>';
                                                                         
                                }

                               
                                $reponse->closeCursor();
                            ?>

    </tbody>
</table>