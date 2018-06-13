@include("layouts/head")
@include("layouts/nav")

@extends('layout')

@section('content')


<h2>Les produits</h2>



@foreach($articleclients as $articleclient)

<article>
<details>
    <summary>
       <label id="nom"> Nom de l'article : {{ $articleclient->title }}</label>
    </summary>
<p>Description de l'article : {!!nl2br($articleclient->body)  !!}</p>
</details>

<label id="qte">Quantité :<input aria-labelledby="quantité de  {{ $articleclient->title }}" 
       class="" step="1" min="0" value="" title="Qté" size="2" pattern="[0-9]*"
       type="number" inputmode="numeric" data-id="{{ $articleclient->id }}"/></label></br>
Prix unitaire :   €  </br>
<button>Ajouter au pannier</button>
</article>
</br></br>


@endforeach

@include("layouts/footer")


