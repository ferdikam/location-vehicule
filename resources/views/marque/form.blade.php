<form method="POST" action="/marque">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Nom de la marque</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
        <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
    </div>
</form>