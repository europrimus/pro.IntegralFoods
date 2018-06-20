@include("layouts/head")
@include("layouts/nav")

<main class="container login">

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif

<div class="container">
  <h1>Integral Foods Pro</h2>
  <div class="logo">
    <img src="/img/Logo-integralFoods.png" alt="logo integral food" >
  </div>

  <h2>Identification</h2>
  <form method="POST" action="{{ action('CoController@check') }}" enctype="multipart/form-data">
    @csrf

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label for="id" class="input-group-text">Identifiant</label>
      </div>
      <input id="id" type="id" name="id" value="{{ old('id') }}" required autofocus
        class="{{ $errors->has('id') ? 'is-invalid' : '' }}">
      @if ($errors->has('id'))
        <span class="invalid">{{ $errors->first('id') }}</span>
      @endif
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label for="password" class="input-group-text">Mot de passe</label>
      </div>
      <input id="password" type="password" name="password" required
        class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
      @if ($errors->has('password'))
        <span class="invalid">{{ $errors->first('password') }}</span>
      @endif
    </div>
<!--
    <label for="remember" class="">Se souvenir de moi</label>
      <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
  <br>
-->
    <button type="submit" class="btn">Se connecter</button>
  <br>
    <!-- <a class="" href="{{ route('password.request') }}">Mot de passe oublié</a> -->
  </form>
  <a href="/preinscription">Inscription</a>
</div>
</main>
@include("layouts/footer")
