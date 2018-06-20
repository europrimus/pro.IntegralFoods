<form action="/produits" method="post" enctype="multipart/form-data">
  @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom du produit :</strong>
            {!! Form::text('titre', null, array('placeholder' => 'Produit','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description :</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:150px')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Référence :</strong>
            {!! Form::text('reference', null , array('class' => 'form-control',)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>EAN :</strong>
            {!! Form::text('ean', '376028145' , array('placeholder' => 'EAN','class' => 'form-control',)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sélectionner une image :</strong>
            <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
            <input type="file" name="photo" id="photo" accept="image/*" >
        </div>
    </div>




    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
</form>
