@include("layouts/head")
@include("layouts/nav")

@extends('layout')

@section('content')


<h2>Les produits</h2>

<article>

@foreach($articleclients as $articleclient)

<div>Nom de l'article : {{ $articleclient->title }}</div>
<div>Description de l'article : {!!nl2br($articleclient->body)  !!}</div>
<div>Quantité :<input aria-labelledby="quantité de 
       class="" step="1" min="0" max="50" value="" title="Qté" size="2" pattern="[0-9]*"
       type="number" inputmode="numeric" data-prixUnitaire=""/></div>
<div>Prix :     </div></br></br>


@endforeach

</article>


