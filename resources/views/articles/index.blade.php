@include("layouts/head")
@include("layouts/nav")

@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Les produits</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('produits.create') }}" class="btn btn-sucess">Créer un nouveau produit</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>N°</th>
            <th>Photo</th>
            <th>Nom du produit</th>
            <th>Description</th>
            <th>Réference</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($articles as $article)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img width="100" height="100" src="/storage/photo/{{ $article->reference }}.png" class="" alt="" /></td>
            <td>{{ $article->titre }}</td>
            <td>{{ $article->description }}</td>
            <td>{{ $article->reference }}</td>
            <td>
                <a href="{{ route('produits.show', $article->id) }}" class="btn btn-info">Voir</a>
                <a href="{{ route('produits.edit', $article->id) }}" class="btn btn-primary">Éditer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['produits.destroy', $article->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </table>

    {!! $articles->links() !!}
@endsection