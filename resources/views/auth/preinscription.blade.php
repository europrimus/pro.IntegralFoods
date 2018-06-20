@include("layouts/head")
@include("layouts/nav")

<main class="container login">

<h2>Pre Inscription</h2>
  <form method="POST" action="{{ action('PreinscriptionController@store') }}" enctype="multipart/form-data" class="inscrForm">
    @csrf
    <fieldset>
		<legend>Formulaire de premier contact :</legend>
<div class="row">
    <div class="col"><!-- colone gauche -->
  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="civilite" class="">Civilité :</label>
    			<select id="civilite" name="civilite" value="{{ old('civilite') }}" required
    				class="form-control {{ $errors->has('civilite') ? 'invalid' : '' }}">
    				<option value = "" default selected disabled hidden>Sélectionner</option>
    				<option value="Monsieur">Monsieur</option>
    				<option value="Madame">Madame</option>
    			</select>
    			@if ($errors->has('civilite'))
    			<span class="invalid">{{ $errors->first('civilite') }}</span>
    			@endif
  		  </div>
  		</div>


  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="nom" class="">Votre nom :</label>
    			<input id="nom" type="text" name="nom" value="{{ old('nom') }}" required autofocus
    			class="form-control {{ $errors->has('nom') ? 'invalid' : '' }}">
    			@if ($errors->has('nom'))
    			<span class="invalid">{{ $errors->first('nom') }}</span>
    			@endif
  		  </div>
  		</div>

  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="prenom" class="">Votre prénom :</label>
    			<input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required
    			class="form-control {{ $errors->has('prenom') ? 'invalid' : '' }}">
    			@if ($errors->has('prenom'))
    			<span class="invalid">{{ $errors->first('prenom') }}</span>
    			@endif
  		  </div>
  		</div>

  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="email" class="">Votre adresse e-mail :</label>
    			<input id="email" type="email"  name="email" value="{{ old('email') }}" required
    			class="form-control {{ $errors->has('email') ? 'invalid' : '' }}">
    			@if ($errors->has('email'))
    			<span class="invalid">{{ $errors->first('email') }}</span>
    			@endif
    		</div>
  		</div>

  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="telephone" class="">Votre téléphone :</label>
    			<input id="tel" type="tel"  name="tel" value="{{ old('tel') }}" required
    			class="form-control {{ $errors->has('tel') ? 'invalid' : '' }}">
    			@if ($errors->has('tel'))
    			<span class="invalid">{{ $errors->first('tel') }}</span>
    			@endif
    		</div>
  		</div>

  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="entreprise" class="">Votre entreprise :</label>
    			<input id="entreprise" type="entreprise"  name="entreprise" value="{{ old('entreprise') }}" required
    			class="form-control {{ $errors->has('entreprise') ? 'invalid' : '' }}">
    			@if ($errors->has('entreprise'))
    			<span class="invalid">{{ $errors->first('entreprise') }}</span>
    			@endif
    		</div>
  		</div>

  		<div class="input-group input-group-sm mb-3">
    		<div class="input-group-prepend">
    			<label for="etablissement" class="">Votre type d'établissement :</label>
    			<select onchange="ToggleVisibility()" id="etablissement" name="etablissement" value="{{ old('etablissement') }}" required
    				class=" form-control {{ $errors->has('etablissement') ? 'invalid' : '' }}">
    				<option value = "" default selected disabled hidden>Sélectionner</option>
    				<option value="distributeur">Distributeur</option>
    				<option value="restaurant indépendant">Restaurant indépendant</option>
    				<option value="chaîne de restaurants">Chaîne de restaurants ou franchise</option>
    				<option value="épicerie">Epicerie fine</option>
    				<option value="collectivité">Collectivité</option>
    				<option value="traiteur">Traiteur</option>
    				<option value="industrie">Industrie agroalimentaire</option>
    				<option value="autre">Autre</option>
    			</select>
    			@if ($errors->has('etablissement'))
    			<span class="invalid">{{ $errors->first('etablissement') }}</span>
    			@endif
  		  </div>
  		</div>

		<div class="input-group input-group-sm mb-3">
  		<div class="input-group-prepend">
  			<label id="etabAutreLabel" for="etablissementautre" class="" style="visibility:hidden;">Précisez :</label>
  			<input id="etablissementautre" type="text"  name="etablissementautre" value="{{ old('etablissementautre') }}"
  			class="form-control {{ $errors->has('etablissementautre') ? 'invalid' : '' }}" style="visibility:hidden;">
  			@if ($errors->has('etablissementautre'))
  			<span class="">{{ $errors->first('etablissementautre') }}</span>
  			@endif
  		</div>
		</div>
  </div><!-- fin colone gauche -->

  <div class="col"><!-- colone droite -->
		<div class="input-group input-group-sm mb-3">
  		<div class="input-group-prepend">
  			<label for="adresse" class="">Votre adresse :</label>
  			<input id="adresse" type="text"  name="adresse" value="{{ old('adresse') }}" required
  			class="form-control {{ $errors->has('adresse') ? 'invalid' : '' }}">
  			@if ($errors->has('adresse'))
  			<span class="invalid">{{ $errors->first('adresse') }}</span>
  			@endif
  		</div>
		</div>

		<div class="input-group input-group-sm mb-3">
  		<div class="input-group-prepend">
  			<label for="codePostal" class="">Code postal :</label>
  			<input id="codePostal" type="text"  name="codePostal" value="{{ old('codePostal') }}" required
  			class="form-control {{ $errors->has('codePostal') ? 'invalid' : '' }}">
  			@if ($errors->has('codePostal'))
  			<span class="invalid">{{ $errors->first('codePostal') }}</span>
  			@endif
  		</div>
		</div>

		<div class="input-group input-group-sm mb-3">
  		<div class="input-group-prepend">
  			<label for="ville" class="">Ville : </label>
  			<input id="ville" type="text"  name="ville" value="{{ old('ville') }}" required
  			class="form-control {{ $errors->has('ville') ? 'invalid' : '' }}">
  			@if ($errors->has('ville'))
  			<span class="invalid">{{ $errors->first('ville') }}</span>
  			@endif
  		</div>
		</div>

		<div class="input-group input-group-sm mb-3">
  		<div class="input-group-prepend">
  			<label for="commentaire" class="">Commentaire :</label>
  			<textarea id="commentaire" type="commentaire"  name="commentaire" value="{{ old('commentaire') }}"
  			class="form-control {{ $errors->has('commentaire') ? 'invalid' : '' }}" required></textarea>
  			@if ($errors->has('commentaire'))
  			<span class="invalid">{{ $errors->first('commentaire') }}</span>
  			@endif
  		</div>
		</div>

		<button type="submit" class="">Envoyer</button>

  </div><!-- fin colone droite -->
</div>
	</fieldset>
  </form>
</main>

<script>

	function ToggleVisibility()
	{
		if(document.getElementById('etablissement').value!='autre')
		{
			document.getElementById('etablissementautre').style.visibility = "hidden";
			document.getElementById('etabAutreLabel').style.visibility = "hidden";
		}
		else
		{
			document.getElementById('etablissementautre').style.visibility = "visible";
			document.getElementById('etabAutreLabel').style.visibility = "visible";
		}
	}
</script>

@include("layouts/footer")
