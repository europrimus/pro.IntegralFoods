@include("layouts/head")
@include("layouts/nav")



<h2>Les produits</h2>
<div class="d-flex justify-content-center flex-wrap">

<!-- <div id="Recherher">
  <input  type="text" placeholder="Rechercher">
</div>

<input type = 'submit' value = 'Rechercher' OnClick="recherche()"> -->


@foreach($articleclients as $articleclient)
<div id='message'></div>
<article class="catalogueclient">

        <h3 class="nom">{{ $articleclient->nom }}</h3>
            <p class="ref"><i>Réf : {{ $articleclient->reference }}</i></br>
             <i>EAN : {{ $articleclient->ean }}</i></p>
    <details>

        <summary>Voir detail</summary>

    <p>Description du produit :</br> {!!nl2br($articleclient->description)  !!}</p>

    </details>
    
        <img class="imgarticle" height="200" src="/storage/photo/{{ $articleclient->reference }}.png" class="" alt="" /><br>
    <div class="ajout">
        <label id="qte">Quantité : <input class="quantite" placeholder="Qté" aria-labelledby="quantité de {{ $articleclient->nom }}"
            class="" step="1" min="0"  title="Qté" pattern="[0-9]*"
            type="number" inputmode="numeric" data-id="{{ $articleclient->catalogue_id }}"/></label></br>
        
        Prix unitaire : {{ number_format( $articleclient->prix, 2 , "," , " " ) }} €  </br>

        <button class="btn btn-light">Ajouter au panier</button>
    </div>
</article>



@endforeach
</div>
@include("layouts/footer")
