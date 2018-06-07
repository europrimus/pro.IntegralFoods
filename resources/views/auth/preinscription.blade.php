@include("layouts/head")
@include("layouts/nav")
<h2>Pre Incription</h2>
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <fieldset>
      <legend>?.?:</legend>
      <label for="entreprise" class="">Nom de l'entreprise</label>
        <input id="entreprise" type="text" name="entreprise" value="{{ old('entreprise') }}" required autofocus
           class="{{ $errors->has('entreprise') ? 'invalid' : '' }}">
        @if ($errors->has('entreprise'))
          <span class="invalid">{{ $errors->first('entreprise') }}</span>
        @endif
      <br>
      <label for="contact" class="">Votre nom</label>
        <input id="contact" type="text" name="contact" value="{{ old('contact') }}" required
           class="{{ $errors->has('contact') ? 'invalid' : '' }}">
        @if ($errors->has('contact'))
          <span class="invalid">{{ $errors->first('contact') }}</span>
        @endif
    <br>
    <label for="email" class="">Adresse email</label>
      <input id="email" type="email"  name="email" value="{{ old('email') }}" required
      class="{{ $errors->has('email') ? 'invalid' : '' }}">
      @if ($errors->has('email'))
        <span class="">{{ $errors->first('email') }}</span>
      @endif
    <br>
    <label for="message" class="">message</label>
      <textarea id="message" type="message"  name="message" value="{{ old('message') }}" required
      class="{{ $errors->has('message') ? 'invalid' : '' }}"></textarea>
      @if ($errors->has('message'))
        <span class="">{{ $errors->first('message') }}</span>
      @endif
    <br>
    <button type="submit" class="">envoyer</button>
    </fieldset>



  </form>
