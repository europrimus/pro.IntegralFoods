@include("layouts/head")
@include("layouts/nav")

<h2>Les produits</h2>

@foreach($articleclients as $articleclient)

<article>

    <details>

        <summary>
        <h2 class="nom"><strong>{{ $articleclient->nom }}</h2>
            <i>Réf : {{ $articleclient->reference }}</i></br></label>
        </summary>

    <p>Description du produit :</br> {!!nl2br($articleclient->description)  !!}</p>

    </details>
        <img class="imgarticle"width="200" height="200" src="/storage/photo/{{ $articleclient->reference }}.png" class="" alt="" /><br>
        <p>Conditionement : <span>{{ $articleclient->conditionnement }}</span></p>
        <label id="qte">Quantité :<input aria-labelledby="quantité de  {{ $articleclient->nom }}"
            class="" step="1" min="0" value="" title="Qté" size="2" pattern="[0-9]*"
            type="number" inputmode="numeric" data-id="{{ $articleclient->catalogue_id }}"/></label></br>
        Prix unitaire :   €  </br>

        <button>Ajouter au pannier</button>

</article>



@endforeach

@include("layouts/footer")
