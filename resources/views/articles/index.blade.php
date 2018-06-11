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
                <a href="{{ route('articles.create') }}" class="btn btn-sucess">Créer un nouvel article</a>
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
            <th>Titre</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($articles as $article)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->body }}</td>
            <td>
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Voir</a>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Éditer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </table>

    {!! $articles->links() !!}
@endsection