@include("layouts/head")
@include("layouts/nav")
<h2>Identification</h2>
<form method="POST" action="{{ route('login') }}">
  @csrf

  <label for="id" class="">Identifiant</label>
  <input id="id" type="id" name="id" value="{{ old('id') }}" required autofocus
      class="{{ $errors->has('id') ? 'is-invalid' : '' }}">
  @if ($errors->has('id'))
    <span class="invalid">{{ $errors->first('id') }}</span>
  @endif
<br>

  <label for="password" class="">Mot de passe</label>
  <input id="password" type="password" name="password" required
    class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
  @if ($errors->has('password'))
    <span class="invalid">{{ $errors->first('password') }}</span>
  @endif
<br>

  <label for="remember" class="">se souvenir de moi</label>
    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
<br>

  <button type="submit" class="">Se connecter</button>
<br>
  <a class="" href="{{ route('password.request') }}">Mot de passe oublié</a>
</form>
<a href="/preinscription">Inscription</a>

@include("layouts/footer")
