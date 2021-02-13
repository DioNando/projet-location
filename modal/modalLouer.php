<div class="modal fade" id="modalLouer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../traitement/modifLouer.php" method="POST">

                    <div class="mb-2">
                        <label for="inputLocataire" class="form-label">Identifiant locataire</label>
                        <div class="row">
                            <div class="col-6">
                            <input type="text" class="form-control" id="inputLocataire" name="Locataire">                    
                            </div>
                            <div class="col-6">                            
                            <input type="text" class="form-control" id="inputID_Locataire" name="ID_Locataire">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="inputVoiture" class="form-label">Identification voiture</label>
                        <div class="row">
                            <div class="col-6">
                            <input type="text" class="form-control" id="inputVoiture" name="Voiture">
                            </div>

                            <div class="col-6">
                        <input type="text" class="form-control" id="inputID_Voiture" name="ID_Voiture">
                            </div>
                        </div>
                    </div>
            
                    <div class="mb-2">
                        <label for="inputNbJour" class="form-label">Nombre de jour</label>
                        <input type="number" class="form-control" id="inputNbJour" name="NbJour" min="1">
                    </div>
                    <div class="mb-2">
                        <label for="inputDate" class="form-label">Date de location</label>
                        <input type="date" class="form-control" id="inputDate" name="Date_Location">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary" id="btnSubmit" name="modifier">Valider</button>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>