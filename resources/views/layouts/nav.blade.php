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
@if(App\utilisateur::getMyRole(session("UserId")) == "administrateur")
      <li class="nav-item">
        <a href="{{ URL::route('produits.index') }}" class="nav-link">Produits</a>
      </li>

      <li class="nav-item">
        <a href="{{ URL::route('admin.client.liste') }}" class="nav-link">clients</a>
      </li>
@elseif(App\utilisateur::getMyRole(session("UserId")) == "client")
      <li class="nav-item">
        <a href="{{ URL::route('produitsclient.index') }}" class="nav-link">Produits</a>
      </li>

      <li class="nav-item">
        <a href="{{ URL::route('panier') }}" class="nav-link">Mon panier ({{ App\Panier::panierCount() }})</a>
      </li>
@endif
    </ul>


    <ul id="menu-deroulant">
      <li class="profil"><div><span class="fas fa-user-alt"></span></br>
      <strong> {{ App\utilisateur::getEntreprise(session("UserId")) }} </strong></div>
        <ul>
          <li class="nav-item"><a href="{{ URL::route('monCompte') }}" class="nav-link">Commande</a></li>
          <li class="nav-item"><a href="{{ URL::route('profil.index') }}" class="nav-link">Profil</a></li>

        </ul>
      </li>
    </ul>

  </div>
</nav>
