<div class="modal fade" id="modif_<?php echo $donnees['ID_Voiture']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #5eaaa8;">
                <h4 class="modal-title" id="myModalLabel" style="color: white;">Modifier</h4>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="Modif.php">
				<input type="hidden" class="form-control" name="ID_Voiture" value="<?php echo $donnees['ID_Voiture']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Numéro:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Voiture" value="<?php echo $donnees['Voiture']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Désignation:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Designation" value="<?php echo $donnees['Designation']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Loyer:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Loyer_Journalier" value="<?php echo $donnees['Loyer']; ?>">
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
<div class="modal fade" id="suppr_<?php echo $donnees['ID_Voiture']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #cd5d7d;">
                <h4 class="modal-title" id="myModalLabel" style="color: white;">Retirer une voiture</h4>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Etes-vous sûre de vouloir retirer cette voiture ?</p>
				<h2 class="text-center"><?php echo $donnees['Designation']; ?></h2>
			</div>
            <div class="modal-footer" style="background: #cd5d7d;">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <a href="Suppr.php?ID_Voiture=<?php echo $donnees['ID_Voiture']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Oui</a>
            </div>

        </div>
    </div>
</div>