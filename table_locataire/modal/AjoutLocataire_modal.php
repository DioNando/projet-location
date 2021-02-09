
<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1687a7;">
                <h4 class="modal-title" id="myModalLabel" style="color: white;">AJOUT LOCATAIRES</h4>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="locataire_post.php">
                        <label class="w3-label w3-left">Numéro Locataire</label>
                        <input class="w3-input w3-border w3-round-large" type="text" name="Locataire" placeholder="Entrez le numéro du locataire">
                        
                        <label class="w3-label w3-left">Nom</label>
                        <input class="w3-input w3-border w3-round-large" name="Nom" type="text" placeholder="Entrez le nom du locataire">

                        <label class="w3-label w3-left">Adresse</label>
                        <input class="w3-input w3-border w3-round-large" type="text" name="Adresse" placeholder="Entrez l'adresse du locataire">
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