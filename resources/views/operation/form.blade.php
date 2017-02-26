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
                <label for="type_operation_id">Type d'opération</label>
                <select class="form-control" id="type_operation_id" name="type_operation_id">
                    @foreach($typeoperations as $typeoperation)
                        <option value="{{ $typeoperation->id }}">{{ $typeoperation->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" class="form-control" name="montant" id="montant" value="{{ old('montant') or $operation->montant }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="fournisseur_id">Fournisseur</label>
                <select class="form-control" id="fournisseur_id" name="fournisseur_id">
                        <option value="0">-----------------------</option>
                    @foreach($fournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date">Date de début</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ old('date') or $operation->date }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date_next">Date de fin</label>
                <input type="date" class="form-control" name="date_next" id="date_next" value="{{ old('date_next') or $operation->date_next }}">
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>