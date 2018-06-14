@include("layouts/head")
@include("layouts/nav")

<h2>Commande</h2>
<h3>Contenu du panier</h3>

@empty($lignes)
  <p>Le panier est vide</p>
@else
<form action="/commande" method="post">
  @csrf
  <table id="panier">
  <tr class="">
    <th class="" >sup</th>
    <th class="" >img</th>
    <th class="" >Produit</th>
    <th class="" >Conditionnement</th>
    <th class="" >Référence</th>
    <th class="" >Prix</th>
    <th class="" >Quantité</th>
    <th class="" >Total</th>
  </tr>
  @each('commande/panier_ligne', $lignes, 'ligne')
  </table>
  <p>Total : <span id="prixTotal">{{ number_format( $prixTotal, 2 , "," , " " ) }}</span>&euro;</p>
  <a href="{{ URL::to('/panier/toutSupprimer') }}">Vider le panier</a>
@endempty
<h3>Commandez</h3>

  <label for="adresseLivraison"></label>
  <select name="adresseLivraison" id="adresseLivraison">
    <option value="" selected disabled>Choissir une adresse</option>
  @foreach( $adresses as $adresse)
    <option value="{{ $adresse->id }}">{{ $adresse->adresse }}</option>
  @endforeach
  </select>
  <br>
  <input type="submit" name="valider" value="Valider">
</form>
@include("layouts/footer")
