<div class="modal fade" id="modalVoiture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modification</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../traitement/modifVoiture.php" method="POST">
                <div class="mb-2">
                        <label for="inputID" class="form-label">Identification voiture</label>
                        <input type="text" class="form-control" id="inputID" name="ID_Voiture" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="inputVoiture" class="form-label">Identification voiture</label>
                        <input type="text" class="form-control" id="inputVoiture" name="Voiture">
                    </div>
                    <div class="mb-2">
                        <label for="inputDesignation" class="form-label">Désignation</label>
                        <input type="text" class="form-control" id="inputDesignation" name="Designation">
                    </div>
                    <div class="mb-2">
                        <label for="inputLoyer" class="form-label">Loyer journalier</label>
                        <input type="number" class="form-control" id="inputLoyer" name="Loyer_Journalier" min="1">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary" id="btnSubmit" name="modifier">Valider</button>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- DELETE -->

<div class="modal fade" id="modalVoitureDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Suppression</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>Voulez-vous vraiment supprimer <b id="innerVoitDel"></b> <b id="innerIDdel"></b> ?</p>
                <form action="../traitement/suppVoiture.php" method="POST">
                    <div class="mb-2" style="display: none;">
                        <label for="inputID" class="form-label">Identification</label>
                        <input type="text" class="form-control" id="inputIDdel" name="ID_Voiture" readonly>
                    </div>
                    

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-warning" id="btnDelete" name="effacer">Effacer</button>
                    </div>
                    
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>