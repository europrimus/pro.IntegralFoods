@include("layouts/head")
@include("layouts/nav")

<main class="container">

<h2>Pre Inscription</h2>
  <form method="POST" action="{{ action('PreinscriptionController@store') }}" enctype="multipart/form-data" class="inscrForm">
    @csrf
    <fieldset>
		<legend>Formulaire de premier contact :</legend>
<div class="row">
    <div class="col"><!-- colone gauche -->
      <div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="civilite" class="input-group-text">Civilité</label>
        </div>
  			<select id="civilite" name="civilite" required
  				class="form-control {{ $errors->has('civilite') ? 'invalid' : '' }}">
  				<option value="" default selected disabled hidden>Sélectionner</option>
  				<option value="Monsieur" {{ old('civilite') == "Monsieur" ? "selected" : "" }}>Monsieur</option>
  				<option value="Madame" {{ old('civilite') == "Madame" ? "selected" : "" }}>Madame</option>
  			</select>
  			@if ($errors->has('civilite'))
  			<span class="invalid form-control">{{ $errors->first('civilite') }}</span>
  			@endif
      </div>


  		<div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="nom" class="input-group-text">Votre nom</label>
        </div>
  			<input id="nom" type="text" name="nom" value="{{ old('nom') }}" required
  			   class="form-control {{ $errors->has('nom') ? 'invalid' : '' }}">
  			@if ($errors->has('nom'))
  			   <span class="invalid form-control">{{ $errors->first('nom') }}</span>
  			@endif
  		</div>

  		<div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="prenom" class="input-group-text">Votre prénom</label>
        </div>
  			<input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required
    			class="form-control {{ $errors->has('prenom') ? 'invalid' : '' }}">
  			@if ($errors->has('prenom'))
    			<span class="invalid form-control">{{ $errors->first('prenom') }}</span>
  			@endif
  		</div>

  		<div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="email" class="input-group-text">Votre adresse e-mail</label>
        </div>
			 <input id="email" type="email"  name="email" value="{{ old('email') }}" required
    			class="form-control {{ $errors->has('email') ? 'invalid' : '' }}">
  			@if ($errors->has('email'))
    			<span class="invalid form-control">{{ $errors->first('email') }}</span>
  			@endif
  		</div>

  		<div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="telephone" class="input-group-text">Votre téléphone</label>
        </div>
  			<input id="tel" type="tel"  name="tel" value="{{ old('tel') }}" required
    			class="form-control {{ $errors->has('tel') ? 'invalid' : '' }}">
  			@if ($errors->has('tel'))
    			<span class="invalid form-control">{{ $errors->first('tel') }}</span>
  			@endif
  		</div>
    </div><!-- fin colone gauche -->

    <div class="col"><!-- colone droite -->
  		<div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="entreprise" class="input-group-text">Votre entreprise</label>
        </div>
  			<input id="entreprise" type="entreprise"  name="entreprise" value="{{ old('entreprise') }}" required
    			class="form-control {{ $errors->has('entreprise') ? 'invalid' : '' }}">
  			@if ($errors->has('entreprise'))
    			<span class="invalid form-control">{{ $errors->first('entreprise') }}</span>
  			@endif
  		</div>

  		<div class="input-group mb-3">
    		<div class="input-group-prepend">
    			<label for="etablissement" class="input-group-text">Votre type d'établissement</label>
        </div>
  			<select id="etablissement" name="etablissement" required
  				class=" form-control {{ $errors->has('etablissement') ? 'invalid' : '' }}">
  				<option value = "" default selected disabled hidden>Sélectionner</option>
  				<option value="distributeur" {{ old('etablissement') == "distributeur" ? "selected" : "" }}>Distributeur</option>
  				<option value="restaurant indépendant" {{ old('etablissement') == "restaurant indépendant" ? "selected" : "" }}>Restaurant indépendant</option>
  				<option value="chaîne de restaurants" {{ old('etablissement') == "chaîne de restaurants" ? "selected" : "" }}>Chaîne de restaurants ou franchise</option>
  				<option value="épicerie" {{ old('etablissement') == "épicerie" ? "selected" : "" }}>Epicerie fine</option>
  				<option value="collectivité" {{ old('etablissement') == "collectivité" ? "selected" : "" }}>Collectivité</option>
  				<option value="traiteur" {{ old('etablissement') == "traiteur" ? "selected" : "" }}>Traiteur</option>
  				<option value="industrie" {{ old('etablissement') == "industrie" ? "selected" : "" }}>Industrie agroalimentaire</option>
  				<option value="autre" {{ old('etablissement') == "autre" ? "selected" : "" }}>Autre</option>
  			</select>
  			@if ($errors->has('etablissement'))
    			<span class="invalid form-control">{{ $errors->first('etablissement') }}</span>
  			@endif
  		</div>

		<div class="input-group mb-3 {{ old('etablissement') == "autre" ? "" : "cacher" }}" id="autre">
  		<div class="input-group-prepend">
  			<label for="etablissementautre" class="input-group-text" >Précisez</label>
      </div>
			<input id="etablissementautre" type="text"  name="etablissementautre" value="{{ old('etablissementautre') }}"
  			class="form-control {{ $errors->has('etablissementautre') ? 'invalid' : '' }}" >
			@if ($errors->has('etablissementautre'))
  			<span class="">{{ $errors->first('etablissementautre') }}</span>
			@endif
		</div>

		<div class="input-group mb-3">
  		<div class="input-group-prepend">
  			<label for="adresse" class="input-group-text">Votre adresse</label>
      </div>
			<input id="adresse" type="text"  name="adresse" value="{{ old('adresse') }}" required
  			class="form-control {{ $errors->has('adresse') ? 'invalid' : '' }}">
			@if ($errors->has('adresse'))
  			<span class="invalid form-control">{{ $errors->first('adresse') }}</span>
			@endif
		</div>

		<div class="input-group mb-3">
  		<div class="input-group-prepend">
  			<label for="codePostal" class="input-group-text">Code postal</label>
      </div>
			<input id="codePostal" type="text"  name="codePostal" value="{{ old('codePostal') }}" required
  			class="form-control {{ $errors->has('codePostal') ? 'invalid' : '' }}">
			@if ($errors->has('codePostal'))
  			<span class="invalid form-control">{{ $errors->first('codePostal') }}</span>
			@endif
		</div>

		<div class="input-group mb-3">
  		<div class="input-group-prepend">
  			<label for="ville" class="input-group-text">Ville</label>
      </div>
			<input id="ville" type="text"  name="ville" value="{{ old('ville') }}" required
  			class="form-control {{ $errors->has('ville') ? 'invalid' : '' }}">
			@if ($errors->has('ville'))
  			<span class="invalid form-control">{{ $errors->first('ville') }}</span>
			@endif
		</div>

		<div class="input-group mb-3">
  		<div class="input-group-prepend">
  			<label for="commentaire" class="input-group-text">Commentaire</label>
      </div>
			<textarea id="commentaire" type="commentaire"  name="commentaire"
  			class="form-control {{ $errors->has('commentaire') ? 'invalid' : '' }}" required>
{{ old('commentaire') }}
      </textarea>
			@if ($errors->has('commentaire'))
  			<span class="invalid form-control">{{ $errors->first('commentaire') }}</span>
			@endif
		</div>

		<button type="submit" class="btn">Envoyer</button>

  </div><!-- fin colone droite -->
</div>
	</fieldset>
  </form>
</main>

@include("layouts/footer")
