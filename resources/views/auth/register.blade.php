@include("layouts/head")
@include("layouts/nav")
<h2>Incription</h2>

  <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="">
          <label for="name" class="">{{ __('Name') }}</label>

          <div class="">
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
                  <span class="">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="">
          <label for="email" class="">{{ __('E-Mail Address') }}</label>

          <div class="">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="">
          <label for="password" class="">{{ __('Password') }}</label>

          <div class="">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
