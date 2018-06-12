@include("layouts/head")
@include("layouts/nav")

@extends('layout')

@section('content')


<h2>Les produits</h2>

<article>

@foreach($articleclients as $articleclient)

<div>Nom de l'article : {{ $articleclient->title }}</div>
<div>Description de l'article : {{ $articleclient->body }}</div>
<div>Quantité :     </div>
<div>Prix :     </div></br></br>


@endforeach

</article>


