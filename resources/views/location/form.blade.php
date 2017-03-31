{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="client_id">Client</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="vehicule_id">Véhicule</label>
                <select class="form-control" id="vehicule_id" name="vehicule_id" required>
                    @foreach($vehicules as $vehicule)
                        <option value="{{ $vehicule->id }}">{{ $vehicule->modele->marque->name .' ' .$vehicule->modele->name . '-' . $vehicule->immatriculation }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_start">Date de début</label>
                <input type="date" class="form-control" name="date_start" id="date_start"
                       value="{{ $location->date_start }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_end">Date de fin</label>
                <input type="date" class="form-control" name="date_end"
                       value="{{ $location->date_end }}" id="date_end">
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>