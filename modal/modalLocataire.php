<div class="modal fade" id="modalLocataire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-2">
                        <label for="inputLocataire" class="form-label">Identifiant locataire</label>
                        <input type="text" class="form-control" id="inputLocataire" name="Locataire">
                    </div>
                    <div class="mb-2">
                        <label for="inputNom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="inputNom" name="Nom">
                    </div>
                    <div class="mb-2">
                        <label for="inputAdresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="inputAdresse" name="Adresse">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary" id="btnSubmit">Valider</button>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>