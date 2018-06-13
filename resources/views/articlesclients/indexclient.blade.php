@include("layouts/head")
@include("layouts/nav")

@extends('layout')

@section('content')


<h2>Les produits</h2>

<article>

@foreach($articleclients as $articleclient)


<details>
    <summary>
       <label id="nom"> Nom de l'article : {{ $articleclient->title }}</label>
    </summary>
<p>Description de l'article : {!!nl2br($articleclient->body)  !!}</p>
</details>

<label id="qte">Quantité :<input aria-labelledby="quantité de" 
       class="" step="1" min="0" value="" title="Qté" size="2" pattern="[0-9]*"
       type="number" inputmode="numeric" data-prixUnitaire=""/></label></br>
Prix unitaire :   €  </br>
<button>Ajouter au pannier</button>
</br></br>


@endforeach

</article>


