{{ csrf_field() }}
<div class="modal-body">
    <div class="form-group">
        <label for="name">Nom complet</label>
        <input type="text" class="form-control" name="name" id="name"
               value="{{ $user->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Adresse électronique</label>
        <input type="email" class="form-control" name="email" id="email"
               value="{{ $user->email }}" required>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>