{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" class="form-control" name="name" id="name"
                       value="{{ $client->name }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" name="address" id="address"
                       value="{{ $client->address }}">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="phone1">Téléphone 1</label>
            <input type="text" class="form-control" name="phone1" id="phone1"
                   value="{{ $client->phone1 }}" required>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone2">Téléphone 2</label>
                <input type="text" class="form-control" name="phone2" id="phone2"
                       value="{{ $client->phone2 }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="num_cni">N° CNI ou autre pièce d'identité</label>
            <input type="text" class="form-control" name="num_cni" id="num_cni"
                   value="{{ $client->num_cni }}">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="file_cni">Image de la pièce d'identité</label>
                <input type="file" class="form-control" name="file_cni" id="file_cni"
                       value="{{ $client->file_cni }}">
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>