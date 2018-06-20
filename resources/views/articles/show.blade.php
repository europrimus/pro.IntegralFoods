@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2> Produit </h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('produits.index') }}"> Retour</a>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom du produit :</strong>
            {{ $article->titre}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Référence :</strong> {{ $article->reference}}<br>
            <strong>Code EAN :</strong> {{ $article->ean}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Description :</strong>
        {{ $article->description}}
      </div>
    </div>
  </div>
</main>

@include("layouts/footer")
