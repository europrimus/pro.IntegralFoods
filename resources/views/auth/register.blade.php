@include("layouts/head")
@include("layouts/nav")
<h2>Incription</h2>
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <fieldset>
      <legend>Entreprise:</legend>
      <label for="entreprise" class="">Nom</label>
        <input id="entreprise" type="text" name="entreprise" value="{{ old('entreprise') }}" required autofocus
           class="{{ $errors->has('entreprise') ? 'invalid' : '' }}">
        @if ($errors->has('entreprise'))
          <span class="invalid">{{ $errors->first('entreprise') }}</span>
        @endif
<br>
      <label for="siret" class="">Numéro de siret</label>
        <input id="siret" type="text" name="siret" value="{{ old('siret') }}" required
           class="{{ $errors->has('siret') ? 'invalid' : '' }}">
        @if ($errors->has('siret'))
          <span class="invalid">{{ $errors->first('siret') }}</span>
        @endif

<br>
      <label for="kbis" class="">Extrait Kbis</label>
        <input id="kbis" type="file" name="kbis" value="{{ old('kbis') }}" required
           class="{{ $errors->has('kbis') ? 'invalid' : '' }}">
        @if ($errors->has('kbis'))
          <span class="invalid">{{ $errors->first('kbis') }}</span>
        @endif
<br>
      <label for="adresse" class="">Adresse</label>
        <textarea id="adresse" type="text" name="adresse" value="{{ old('adresse') }}" required
           class="{{ $errors->has('adresse') ? 'invalid' : '' }}"></textarea>
        @if ($errors->has('adresse'))
          <span class="invalid">{{ $errors->first('adresse') }}</span>
        @endif
<br>
      <label for="codePostale" class="">Code postale</label>
        <input id="codePostale" type="text" name="codePostale" value="{{ old('codePostale') }}" required
           class="{{ $errors->has('codePostale') ? 'invalid' : '' }}">
        @if ($errors->has('codePostale'))
          <span class="invalid">{{ $errors->first('codePostale') }}</span>
        @endif
<br>
      <label for="ville" class="">Ville</label>
        <input id="ville" type="text" name="ville" value="{{ old('ville') }}" required
           class="{{ $errors->has('ville') ? 'invalid' : '' }}">
        @if ($errors->has('ville'))
          <span class="invalid">{{ $errors->first('ville') }}</span>
        @endif
    </fieldset>
<br>

    <fieldset>
      <legend>Contact:</legend>
      <label for="email" class="">Adresse email</label>
        <input id="email" type="email"  name="email" value="{{ old('email') }}" required
        class="{{ $errors->has('email') ? 'invalid' : '' }}">
        @if ($errors->has('email'))
          <span class="">{{ $errors->first('email') }}</span>
              @endif
<br>

      <div class="">
          <label for="password" class="">{{ __('Password') }}</label>

          <div class="">
              <input id="password" type="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
                  <span class="">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="">
          <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

          <div class="">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>

      <div class=" mb-0">
          <div class=" offset-md-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
              </button>
          </div>
      </div>
  </form>
