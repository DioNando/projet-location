<div class="modal fade" id="modalLocataire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../traitement/modifLocataire.php" method="POST">
                    <div class="mb-2">
                        <label for="inputID" class="form-label">Identifiant</label>
                        <input type="text" class="form-control" id="inputID" name="ID_Locataire" readonly>
                    </div>
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

<!-- DELETE -->

<div class="modal fade" id="modalLocataireDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Suppression</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>Voulez-vous vraiment supprimer <b id="innerLocDel"></b> <b id="innerIDdel"></b> ?</p>
                <form action="../traitement/suppLocataire.php" method="POST">
                    <div class="mb-2" style="display: none;">
                        <label for="inputID" class="form-label">Identifiant</label>
                        <input type="text" class="form-control" id="inputIDdel" name="ID_Locataire" readonly>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-warning" id="btnDelete" name="effacer">Effacer</button>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>