@include("layouts/head")
@include("layouts/nav")
<h2>Pre Incription</h2>
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <fieldset>
		<legend>Formulaire de premier contact :</legend>
		
		<label for="civilite" class="">Civilité</label>
		<select id="civilite" name="civilite" value="{{ old('civilite') }}" required
		    class="{{ $errors->has('civilite') ? 'invalid' : '' }}">
			<option value="monsieur">Monsieur</option>
			<option value="madame">Madame</option>
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
		
		<label for="email" class="">Votre adresse email</label>
		<input id="email" type="email"  name="email" value="{{ old('email') }}" required
		class="{{ $errors->has('email') ? 'invalid' : '' }}">
		@if ($errors->has('email'))
		<span class="">{{ $errors->first('email') }}</span>
		@endif
		<br>
		
		<label for="telephone" class="">Votre téléphone</label>
		<input id="telephone" type="tel"  name="telephone" value="{{ old('telephone') }}" required
		class="{{ $errors->has('telephone') ? 'invalid' : '' }}">
		@if ($errors->has('telephone'))
		<span class="">{{ $errors->first('telephone') }}</span>
		@endif
		<br>
		
		<label for="etablissement" class="">Votre établissement</label>
		<select id="etablissement" name="etablissement" value="{{ old('etablissement') }}" required
		    class="{{ $errors->has('etablissement') ? 'invalid' : '' }}">
			<option value="distributeur">Distributeur</option>
			<option value="independant">Restaurant indépendant</option>
			<option value="chaine">Chaîne de restaurants ou franchise</option>
			<option value="epicerie">Epicerie fine</option>
			<option value="collectivite">Collectivité</option>
			<option value="traiteur">Traiteur</option>
			<option value="industrie">Industrie agroalimentaire</option>
			<option value="autre">Autre</option>
		</select>
		@if ($errors->has('etablissement'))
		  <span class="invalid">{{ $errors->first('etablissement') }}</span>
		@endif
		<br>
		
		<label for="adresse" class="">Votre adresse</label>
		<input id="adresse" type="text"  name="adresse" value="{{ old('adresse') }}" required
		class="{{ $errors->has('adresse') ? 'invalid' : '' }}"></textarea>
		@if ($errors->has('adresse'))
		<span class="">{{ $errors->first('adresse') }}</span>
		@endif
		<br>
		
		<label for="codePostal" class="">Code postal</label>
		<input id="codePostal" type="text"  name="codePostal" value="{{ old('codePostal') }}" required
		class="{{ $errors->has('codePostal') ? 'invalid' : '' }}"></textarea>
		@if ($errors->has('codePostal'))
		<span class="">{{ $errors->first('codePostal') }}</span>
		@endif
		<br>
		
		<label for="ville" class="">Ville</label>
		<input id="ville" type="text"  name="ville" value="{{ old('ville') }}" required
		class="{{ $errors->has('ville') ? 'invalid' : '' }}"></textarea>
		@if ($errors->has('ville'))
		<span class="">{{ $errors->first('ville') }}</span>
		@endif
		<br>
				
		<label for="commentaire" class="">Commentaire</label>
		<textarea id="commentaire" type="commentaire"  name="commentaire" value="{{ old('commentaire') }}"
		class="{{ $errors->has('commentaire') ? 'invalid' : '' }}"></textarea>
		@if ($errors->has('commentaire'))
		<span class="">{{ $errors->first('commentaire') }}</span>
		@endif
		<br>
		
		<button type="submit" class="">Envoyer</button>
		</fieldset>



  </form>
