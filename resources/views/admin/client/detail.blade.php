@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2 class="admin>">Espace d'administration</h2>

  @if ($errors->any())
      <p class="invalid">
            @foreach ($errors->all() as $error)
              {{ $error }}<br>
            @endforeach
      </p>
  @endif
  <div class="row">
    <div class="col-md-6">
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
            <a href="{{  URL::route('admin.client.valider', [ "idClient" =>$client["id"] ] ) }}">Valider l'inscription</a>
          @elseif( $client["role"] == "client" )
            <!-- <a href="">Résilier l'inscription</a> -->
          @endif
        </dd>
        <dt>Contact</dt>
        <dd>{{ $client["civilite"] }} {{ $client["nom"] }} {{ $client["prenom"] }}</dd>
        <dt>Téléphone</dt>
        <dd>{{ $client["tel"] }}</dd>
        <dt>E-mail</dt>
        <dd>{{ $client["email"] }}</dd>
        <dt>Identifiant</dt>
        <dd>{{ $client["login"] }} <!--<a href="">Réinitialiser mot de passe</a>--></dd>
        <dt>Commantaire</dt>
        <dd>{{ $client["commentaire"] }}</dd>
      </dl>
    </div>
    <div class="col-md-6">
      <h3>Liste des Commandes</h3>
      <ul>
        @foreach($listeCommande as $commande)
          <li>{{$commande["date"]}} -
            <a href="{{ URL::route('admin.client.commande.show', ["idCommande"=> $commande["numCommande"], "idClient"=>$client["id"] ] ) }}">
              {{ $commande["numCommande"] }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
  <h3>Liste des produits disponibles pour ce client</h3>
  @if( count($listeProduits) <= 0 )
    <p>Pas de produit.
    <a href="{{  URL::route('admin.client.valider', [ "idClient" =>$client["id"] ] ) }}">Ajouter des produits</a></p>
  @else
    <form method="post" name="creerCatalogue" action="{{ URL::route('admin.client.modifierPrix') }}">
      @csrf
      <table id="creerCatalogue" class="table table-hover">
      <thead class="thead-light">
        <tr >
          <th scope="col"></th>
          <th scope="col">Produit</th>
          <th scope="col">Code barre EAN</th>
          <th scope="col">Référence</th>
          <th scope="col">Prix</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($listeProduits as $produit)
        <tr class="">
          <td class="">
              <img height="100" src="/storage/photo/{{ $produit->reference }}.png" class="" alt="" />
          </td>

          <th class="" data-title="Produit" scope="row">
            <details><summary>{{ $produit->nom }}</summary>
              {{ $produit->description }}
            </details>
          </th>

          <td class="" data-title="Code bare EAN">
            {{ $produit->ean }}
          </td>

          <td class="" data-title="Référence">
            {{ $produit->reference }}
          </td>


          <td class="" data-title="Prix">
            <label class="screen-reader-text" for="prix[{{ $produit->produit_id }}]"></label>
            <input id="prix[{{ $produit->produit_id }}]" name="prix[{{ $produit->produit_id }}]"
              aria-labelledby="prix de {{ $produit->nom }}" title="prix"
              type="number" inputmode="numeric" step="0.01" min="0" value="{{ $produit->prix }}"
              class="prix" /> €
          </td>
        </tr>
        @endforeach
      </table>
      <input type="submit" name="valider" value="Valider">
    </form>
  @endif

</main>

@include("layouts/footer")
