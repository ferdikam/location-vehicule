{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="vehicule_id">Véhicule</label>
                <select class="form-control" id="vehicule_id" name="vehicule_id">
                    @foreach($vehicules as $vehicule)
                        <option value="{{ $vehicule->id }}">{{ $vehicule->modele->name }} - {{ $vehicule->immatriculation }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Assurance</label>
                <select class="form-control" id="name" name="name">
                    <option value="assurance">Assurance</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" class="form-control" name="montant" id="montant">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="fournisseur">Fournisseur</label>
                <input type="text" class="form-control" name="fournisseur" id="fournisseur">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date">Date de début</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date_next">Date de fin</label>
                <input type="date" class="form-control" name="date_next" id="date_next">
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</div>