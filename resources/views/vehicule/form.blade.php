{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="modele_id">Modèle</label>
                <select class="form-control" id="modele_id" name="modele_id" required>
                    @foreach($modeles as $modele)
                        <option value="{{ $modele->id }}">{{ $modele->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="immatriculation">Immatriculation</label>
                <input type="text" class="form-control" name="immatriculation" id="immatriculation"
                       value="{{ $vehicule->immatriculation }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kilometrage">Kilometrage</label>
                <input type="text" class="form-control" name="kilometrage" id="kilometrage"
                       value="{{ $vehicule->kilometrage }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="puissance">Puissance</label>
                <input type="text" class="form-control" name="puissance"
                       value="{{ $vehicule->puissance }}" id="puissance">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="etat">Etat</label>
                <select class="form-control" id="etat" name="etat" required>
                    <option value="disponible">Disponible</option>
                    <option value="en panne">En panne</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="poids_vide">Poids vide</label>
                <input type="text" class="form-control" name="poids_vide" id="poids_vide" value="{{ $vehicule->poids_vide }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="places">Nombre de places</label>
                <input type="number" class="form-control" name="places" id="places" value="{{ $vehicule->places }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="transmission">Transmission</label>
                <select class="form-control" id="transmission" name="transmission" required>
                    <option value="manuelle">Manuelle</option>
                    <option value="automatique">Automatique</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="carburant">carburant</label>
                <select class="form-control" id="carburant" name="carburant" required>
                    <option value="diesel">Diesel</option>
                    <option value="essence">Essence</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="date_arrivee">date d'arrivée</label>
            <input type="date" class="form-control" name="date_arrivee" id="date_arrivee" value="{{ $vehicule->date_arrivee }}">
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>