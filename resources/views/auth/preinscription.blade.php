@include("layouts/head")
@include("layouts/nav")
<h2>Pre Inscription</h2>
  <form method="POST" action="{{ action('PreinscriptionController@store') }}" enctype="multipart/form-data" class="inscrForm">
    @csrf
    <fieldset>
		<legend>Formulaire de premier contact :</legend>
		
		<label for="civilite" class="">Civilité</label>
		<select id="civilite" name="civilite" value="{{ old('civilite') }}" required
		    class="{{ $errors->has('civilite') ? 'invalid' : '' }}">
		    <option value = "" default selected disabled hidden>Sélectionner</option>
			<option value="Monsieur">Monsieur</option>
			<option value="Madame">Madame</option>
		</select>
		@if ($errors->has('civilite'))
		  <span class="invalid">{{ $errors->first('civilite') }}</span>
		@endif
		<br>
		
		<label for="nom" class="">Votre nom</label>
		<input id="nom" type="text" name="nom" value="{{ old('nom') }}" required autofocus
		   class="{{ $errors->has('nom') ? 'invalid' : '' }}">
		@if ($errors->has('nom'))
		  <span class="invalid">{{ $errors->first('nom') }}</span>
		@endif
		<br>
		
		<label for="prenom" class="">Votre prénom</label>
		<input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required
		   class="{{ $errors->has('prenom') ? 'invalid' : '' }}">
		@if ($errors->has('prenom'))
		  <span class="invalid">{{ $errors->first('prenom') }}</span>
		@endif
		<br>
		
		<label for="email" class="">Votre adresse e-mail</label>
		<input id="email" type="email"  name="email" value="{{ old('email') }}" required
		class="{{ $errors->has('email') ? 'invalid' : '' }}">
		@if ($errors->has('email'))
		<span class="">{{ $errors->first('email') }}</span>
		@endif
		<br>
		
		<label for="telephone" class="">Votre téléphone</label>
		<input id="tel" type="tel"  name="tel" value="{{ old('tel') }}" required
		class="{{ $errors->has('tel') ? 'invalid' : '' }}">
		@if ($errors->has('tel'))
		<span class="">{{ $errors->first('tel') }}</span>
		@endif
		<br>
		
		<label for="entreprise" class="">Votre entreprise</label>
		<input id="entreprise" type="entreprise"  name="entreprise" value="{{ old('entreprise') }}" required
		class="{{ $errors->has('entreprise') ? 'invalid' : '' }}">
		@if ($errors->has('entreprise'))
		<span class="">{{ $errors->first('entreprise') }}</span>
		@endif
		<br>
		
		<label for="etablissement" class="">Votre type d'établissement</label>
		<select onchange="ToggleVisibility()" id="etablissement" name="etablissement" value="{{ old('etablissement') }}" required
		    class="{{ $errors->has('etablissement') ? 'invalid' : '' }}">
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
		<br>
		
		<label id="etabAutreLabel" for="etablissementautre" class="" style="visibility:hidden;">Précisez</label>
		<input id="etablissementautre" type="text"  name="etablissementautre" value="{{ old('etablissementautre') }}"
		class="{{ $errors->has('etablissementautre') ? 'invalid' : '' }}" style="visibility:hidden;">
		@if ($errors->has('etablissementautre'))
		<span class="">{{ $errors->first('etablissementautre') }}</span>
		@endif
		<br>
		
		<label for="adresse" class="">Votre adresse</label>
		<input id="adresse" type="text"  name="adresse" value="{{ old('adresse') }}" required
		class="{{ $errors->has('adresse') ? 'invalid' : '' }}">
		@if ($errors->has('adresse'))
		<span class="">{{ $errors->first('adresse') }}</span>
		@endif
		<br>
		
		<label for="codePostal" class="">Code postal</label>
		<input id="codePostal" type="text"  name="codePostal" value="{{ old('codePostal') }}" required
		class="{{ $errors->has('codePostal') ? 'invalid' : '' }}">
		@if ($errors->has('codePostal'))
		<span class="">{{ $errors->first('codePostal') }}</span>
		@endif
		<br>
		
		<label for="ville" class="">Ville</label>
		<input id="ville" type="text"  name="ville" value="{{ old('ville') }}" required
		class="{{ $errors->has('ville') ? 'invalid' : '' }}">
		@if ($errors->has('ville'))
		<span class="">{{ $errors->first('ville') }}</span>
		@endif
		<br>
		
		<label for="commentaire" class="">Commentaire</label>
		<textarea id="commentaire" type="commentaire"  name="commentaire" value="{{ old('commentaire') }}"
		class="{{ $errors->has('commentaire') ? 'invalid' : '' }}" required></textarea>
		@if ($errors->has('commentaire'))
		<span class="">{{ $errors->first('commentaire') }}</span>
		@endif
		<br>
		
		<button type="submit" class="">Envoyer</button>
	</fieldset>


  </form>

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
