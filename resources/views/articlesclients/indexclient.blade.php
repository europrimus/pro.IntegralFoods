@include("layouts/head")
@include("layouts/nav")

<h2>Les produits</h2>
<div class="d-flex justify-content-center flex-wrap">
@foreach($articleclients as $articleclient)

<article>


        <h3 class="nom">{{ $articleclient->nom }}</h3>
            <p class="ref"><i>Réf : {{ $articleclient->reference }}</i></p>
    <details>

        <summary>Voir detail</summary>

    <p>Description du produit :</br> {!!nl2br($articleclient->description)  !!}</p>

    </details>
    
        <img class="imgarticle" height="200" src="/storage/photo/{{ $articleclient->reference }}.png" class="" alt="" /><br>
    <div class="ajout">
        <p>Conditionement : <span>{{ $articleclient->conditionnement }}</span></p>
        <label id="qte">Quantité :<input aria-labelledby="quantité de  {{ $articleclient->nom }}"
            class="" step="1" min="0" value="" title="Qté" size="2" pattern="[0-9]*"
            type="number" inputmode="numeric" data-id="{{ $articleclient->catalogue_id }}"/></label></br>
        Prix unitaire : {{ number_format( $articleclient->prix, 2 , "," , " " ) }} €  </br>

        <button>Ajouter au pannier</button>
    </div>
</article>



@endforeach
</div>
@include("layouts/footer")
