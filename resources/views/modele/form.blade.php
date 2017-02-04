
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="marque_id">Marque</label>
            <select class="form-control" name="marque_id">
                @foreach($marques as $marque)
                    <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
    </div>