<nav class="">
    <img src="/img/Logo-integralFoods.png" alt="logo" id="logo">
    Integral Foods Pro
    <a href="https://www.integralfoods.fr/" >Integral foods</a>
    <a href="{{ URL::route('produits.index') }}">Produits</a>
    <a href="{{ URL::route('produitsclient.index') }}">Produits client</a>
    <a href="{{ URL::route('monCompte') }}">Mon compte</a>

    <a href="{{ URL::route('panier') }}">Mon panier ({{ App\Panier::panierCount() }})</a>

</nav>
