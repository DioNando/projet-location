<div class="modal fade" id="modif_<?php echo $donnees['ID_Locataire']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #5eaaa8;">
                <h4 class="modal-title" id="myModalLabel" style="color: white;">Modifier</h4>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="Modif.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Numéro:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Locataire" value="<?php echo $donnees['Locataire']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Nom:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Nom" value="<?php echo $donnees['Nom']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Adresse:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Adresse" value="<?php echo $donnees['Adresse']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer" style="background: #5eaaa8;">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" name="modifier" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modifier</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="suppr_<?php echo $donnees['ID_Locataire']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #cd5d7d;">
                <h4 class="modal-title" id="myModalLabel" style="color: white;">Retirer un locataire</h4>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Etes-vous sûre de vouloir retirer ce locataire ?</p>
				<h2 class="text-center"><?php echo $donnees['Nom']; ?></h2>
			</div>
            <div class="modal-footer" style="background: #cd5d7d;">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <a href="Suppr.php?ID_Locataire=<?php echo $donnees['ID_Locataire']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Oui</a>
            </div>

        </div>
    </div>
</div>