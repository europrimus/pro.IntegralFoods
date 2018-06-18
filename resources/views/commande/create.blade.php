@include("layouts/head")
@include("layouts/nav")

<div class="container-fluid">
  <h2>Commande</h2>
  <h3>Contenu du panier</h3>

  @if ($errors->any())
      <p class="invalid">
            @foreach ($errors->all() as $error)
              {{ $error }}<br>
            @endforeach
      </p>
  @endif

  @empty($lignes)
    <p>Le panier est vide</p>
  @else
  <form action="/commande" method="post">
    @csrf
    <table id="panier" class="table table-hover">
    <thead class="thead-light">
      <tr >
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Produit</th>
        <th scope="col">Code bare EAN</th>
        <th scope="col">Référence</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantité</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      @each('commande/panier_ligne', $lignes, 'ligne')
    </tbody>
    </table>
    <p>Total : <span id="prixTotal">{{ number_format( $prixTotal, 2 , "," , " " ) }}</span>&euro;</p>
    <a href="{{ URL::to('/panier/toutSupprimer') }}">Vider le panier</a>

  <h3>Commandez</h3>

    <label for="adresseLivraison">Adresse de livraison</label><br>
    <select name="adresseLivraison" id="adresseLivraison">
      <option value="false" selected disabled hidden>Choissir une adresse</option>
    @foreach( $adresses as $adresse)
      <option value="{{ $adresse->id }}"
        {{ ( $adresse->id == old("adresseLivraison") ) ? " selected" :'' }}
        >{{ $adresse->adresse }}</option>
    @endforeach
      <option value="nouvelleAdresse"
        {{ ( "nouvelleAdresse" == old("adresseLivraison") )? " selected":"" }}
        >Nouvelle adresse</option>
    </select>
    <br>
<div id="nouvelleAdresse" class="{{ ( "nouvelleAdresse" != old("adresseLivraison") )? " cacher":"" }}">
  <label for="adresse" class="">Votre adresse</label>
  <input id="adresse" type="text"  name="adresse" value="{{ old('adresse') }}"
  class="{{ $errors->has('adresse') ? 'invalid' : '' }}">
  <br>

  <label for="codePostal" class="">Code postal</label>
  <input id="codePostal" type="text"  name="codePostal" value="{{ old('codePostal') }}"
  class="{{ $errors->has('codePostal') ? 'invalid' : '' }}">
  <br>

  <label for="ville" class="">Ville</label>
  <input id="ville" type="text"  name="ville" value="{{ old('ville') }}"
  class="{{ $errors->has('ville') ? 'invalid' : '' }}">
  <br>
</div>

    <input type="submit" name="valider" value="Valider">
  </form>
  @endempty
</div>
@include("layouts/footer")
