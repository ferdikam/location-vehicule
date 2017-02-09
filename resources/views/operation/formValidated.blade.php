{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <p>Voulez-vous valider l'opération <strong>{{ $operation->typeOperation->name  }}</strong> de montant
                    <strong>{{ $operation->montant }}</strong> ?</p>
                <input type="hidden" name="operation_id" value="{{ $operation->id }}">
                <input type="hidden" name="validated" value="{{ $operation->validated }}">
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
    <button type="submit" class="btn btn-primary">{{ $btnSubmit }}</button>
</div>