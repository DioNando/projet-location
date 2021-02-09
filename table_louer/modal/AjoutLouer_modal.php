
<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1687a7;">
                <h4 class="modal-title" id="myModalLabel" style="color: white;">AJOUT LOCATAIRES</h4>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="louer_post.php">
                        <div class="mb-2">
                            <label for="#" class="form-label">Identifiant locataire</label>
                            <select class="form-select form-control" aria-label="Default select example" name="ID_Locataire">

                            <?php 

                            $reponse = $bdd->query('SELECT * FROM table_locataire ORDER BY ID_Locataire DESC LIMIT 10');

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                                    <option value="<?php echo $donnees['ID_Locataire'] ?>"> <?php echo htmlspecialchars($donnees['Locataire']) . ' ' . htmlspecialchars($donnees['ID_Locataire']); ?> </option>
                                <?php
                                }

                                $reponse->closeCursor();
                            ?>
                                
                            </select>
                            </div>

                            <div class="mb-2">
                                <label for="#" class="form-label">Identification voiture</label>
                                <select class="form-select form-control" aria-label="Default select example" name="ID_Voiture">

                            <?php 

                            $reponse = $bdd->query('SELECT * FROM table_voiture');

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                                    <option value="<?php echo $donnees['ID_Voiture'] ?>"> <?php echo htmlspecialchars($donnees['Voiture']) . ' ' . htmlspecialchars($donnees['ID_Voiture']); ?> </option>
                                <?php
                                }

                                $reponse->closeCursor();
                            ?>
                                
                            </select>
                            </div>
                            <div class="mb-2">
                                <label for="#" class="form-label">Nombre de jour</label>
                                <input type="number" class="form-control" id="#" name="nb_Jour" placeholder="Entrez le nombre de jour">
                            </div>
                            <div class="mb-2">
                                <label for="#" class="form-label">Date de location</label>
                                <input type="date" class="form-control" id="#" name="date_Location">
                            </div>

            </div> 
                
            </div>
            <div class="modal-footer" style="background: #1687a7;">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" name="ajout" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</a>
            </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .w3-label{
        color: #557174;
    }
</style>