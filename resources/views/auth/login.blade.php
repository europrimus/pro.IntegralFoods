@include("layouts/head")
@include("layouts/nav")
<h2>Identification</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="">
        <label for="id" class="">Identifiant</label>

        <div class="col-md-6">
            <input id="id" type="id" name="id" value="{{ old('id') }}" required autofocus
              class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}">

            @if ($errors->has('id'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="">
        <label for="password" class="">Mot de passe</label>

        <div class="col-md-6">
            <input id="password" type="password" name="password" required
              class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                     se souvenir de moi
                </label>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <button type="submit" class="">
                Se connecter
            </button>

            <a class="" href="{{ route('password.request') }}">
                Mot de passe oublié
            </a>
        </div>
    </div>
</form>
<a href="/inscription">Inscription</a>

@include("layouts/footer")
