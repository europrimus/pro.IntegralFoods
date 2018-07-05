@include("layouts/head")
@include("layouts/nav")

<main class="container">

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajout du produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produits.index') }}"> Retour</a>
            </div>
        </div>
    </div>


    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Oups !</strong> Il y a un problème avec votre saisie.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
@include('articles.form')

</main>
@include('layouts.footer')
