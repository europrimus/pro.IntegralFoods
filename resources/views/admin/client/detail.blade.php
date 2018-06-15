@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2 class="admin>">Espace d'administration</h2>
  <h3>{{ $client["entreprise"] }}</h3>
  <dl>
    <dt>Type d'établissement</dt>
    <dd>
      @isset( $client["etabliementautre"] )
        {{ $client["etabliementautre"] }}
      @else
        {{ $client["etablissement"] }}
      @endisset
    </dd>
    <dt>N° siret</dt>
    <dd>{{ $client["siret"] }}</dd>
    <dt>Etat du compte</dt>
    <dd>
      {{ $client["role"] }}
      @if( $client["role"] == "inscription en attente" )
        <a href="/admin/client/valider/{{ $client["id"] }}">Valider l'inscription</a>
      @elseif( $client["role"] == "client" )
        <a href="">Résilier l'inscription</a>
      @endif
    </dd>
    <dt>Contact</dt>
    <dd>{{ $client["civilite"] }} {{ $client["nom"] }} {{ $client["prenom"] }}</dd>
    <dt>Téléphone</dt>
    <dd>{{ $client["tel"] }}</dd>
    <dt>e-mail</dt>
    <dd>{{ $client["email"] }}</dd>
    <dt>Identifiant</dt>
    <dd>{{ $client["login"] }} <a href="">Réinitialiser mot de passe</a></dd>
    <dt>Commantaire</dt>
    <dd>{{ $client["commentaire"] }}</dd>
  </dl>
</main>

@include("layouts/footer")
