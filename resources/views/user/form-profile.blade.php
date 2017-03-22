{{ csrf_field() }}
<div class="modal-body">
    <div class="form-group">
        <label for="phone1">Téléphone 1</label>
        <input type="text" class="form-control" name="phone1" id="phone1"
               value="{{ $profile->phone1 or old('phone1') }}" required>
    </div>
    <div class="form-group">
        <label for="phone2">Téléphone 2</label>
        <input type="text" class="form-control" name="phone2" id="phone2"
               value="{{ $profile->phone2 or old('phone2') }}">
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>