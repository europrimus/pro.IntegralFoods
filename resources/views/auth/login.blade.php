@include("layouts/head")
@include("layouts/nav")


<<<<<<< HEAD
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif



=======
>>>>>>> f089ab3a07b95de37e83afd7a71f94514f71f8e5
<main class="login">

<div class="container">
  <h1>Integral Foods Pro</h2>
  <img src="/img/Logo-integralFoods.png" alt="logo integral food" >

  <h2>Identification</h2>
  <form method="POST" action="{{ action('CoController@check') }}" enctype="multipart/form-data">
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

    <label for="remember" class="">Se souvenir de moi</label>
      <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
  <br>

    <button type="submit" class="">Se connecter</button>
  <br>
    <a class="" href="{{ route('password.request') }}">Mot de passe oublié</a>
  </form>
  <a href="/preinscription">Inscription</a>
</div>
</main>
@include("layouts/footer")
