<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom du produit:</strong>

            {!! Form::text('titre', null, array('placeholder' => 'Produit','class' => 'form-control')) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description :</strong>

            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:150px')) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
