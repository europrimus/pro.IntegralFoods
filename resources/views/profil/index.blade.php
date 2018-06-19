@include("layouts/head")
@include("layouts/nav")

@extends('layout')

@section('content')

 <h3>Profil</h3>
 <form method="POST" action="{{ ('profil') }}" enctype="multipart/form-data" class="inscrForm">
    @csrf
  <dl>
    <dt>Type d'établissement</dt>
    <dd>
      @isset( $client["etabliementautre"] )
        {{ $client["etabliementautre"] }}
      @else
        {{ $client["etablissement"] }}
      @endisset
    </dd>

    <dt>N° siret</dt>
    <dd>{{ $client["siret"] }}"</dd>

    <dt>Contact</dt>
    <label for="civilite" class="">Civilité</label>
		<select id="civilite" name="civilite" value="{{ old('civilite') }}" required
		    class="{{ $errors->has('civilite') ? 'invalid' : '' }}">
			<option value="Monsieur" {{ ( "Monsieur" == $client['civilite'] )? " selected":"" }}>Monsieur</option>
			<option value="Madame" {{ ( "Madame" == $client['civilite'] )? " selected":"" }}>Madame</option>
        </select><br>
        
    <label for="nom" class="">Votre nom</label>
    <input id="nom" type="text" name="nom" value="{{ $client["nom"] }}" required autofocus
        class="{{ $errors->has('nom') ? 'invalid' : '' }}"><br>
    <label for="prenom" class="">Votre prénom</label>

    <input id="prenom" type="text" name="prenom" value="{{ $client["prenom"] }}" required
        class="{{ $errors->has('prenom') ? 'invalid' : '' }}">
    
    <dt>Téléphone</dt>
    <dd><input id="tel" type="text" name="tel" value="{{ $client["tel"] }}"></dd>

    <dt>e-mail</dt>
    <dd><input id=)"email" type="text" name="email" value="{{ $client["email"] }}"></dd>

    <dt>Identifiant</dt>
    <dd>{{ $client["login"] }}</dd>
  </dl>

    <button type="submit">Modifier</button>

 </form>