<!--
<nav class="">
    <img src="/img/Logo-integralFoods.png" alt="logo" id="logo">
    Integral Foods Pro
    <a href="https://www.integralfoods.fr/" >Integral foods</a>
    <a href="{{ URL::route('produits.index') }}">Produits</a>
    <a href="{{ URL::route('produitsclient.index') }}">Produits client</a>
    <a href="{{ URL::route('monCompte') }}">Mon compte</a>

    <a href="{{ URL::route('panier') }}">Mon panier ({{ App\Panier::panierCount() }})</a>
</nav>
-->

<nav class="navbar navbar-expand-md navbar-light bg-light">
   <a class="navbar-brand" href="/">
     <img src="/img/Logo-integralFoods.png" alt="logo" id="logo">
   </a>
    <div><h1>Integral Foods Pro</h1></div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Afficher le menu de navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTop">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a href="https://www.integralfoods.fr/" class="nav-link">Site particulier</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::route('produits.index') }}" class="nav-link">Produits (admin)</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::route('admin.client.liste') }}" class="nav-link">clients (admin)</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::route('produitsclient.index') }}" class="nav-link">Produits</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::route('monCompte') }}" class="nav-link">Mon compte</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::route('panier') }}" class="nav-link">Mon panier ({{ App\Panier::panierCount() }})</a>
      </li>
    </ul>
    connecté en id {{ session("UserId") }}
  </div>
</nav>
