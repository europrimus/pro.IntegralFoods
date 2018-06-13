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
    <th class="">
      sup
    </th>

    <th class="">
      img
    </th>

    <th class="" >
      produit
    </th>

    <th class="" >
      prix
    </th>

    <th class="">
      Quantité
    </th>

    <th class="" >
      total
    </th>
  </tr>
  @each('commande/panier_ligne', $lignes, 'ligne')
  </table>
  <p>Total: <span id="prixTotal">{{ number_format( $prixTotal, 2, "," , " " ) }}</span>&euro;</p>
  <a href="{{ URL::to('/panier/toutSupprimer') }}">Vider le panier</a>
  <!-- <a href="{{ URL::to('/panier') }}">Recalculer</a>-->
@endempty
<h3>Commander</h3>

@empty($adresses)
  <p>Pas d'adresse enregistrer. Ajouter une adresse.</p>
@else
  <label for="adresseLivraison">Adresse de livraison</label><br>
  <select id="adresseLivraison" name="adresseLivraison">
    <option value="" selected disabled="true" >Choisir une adresse</option>
    <option value="AjouterAdresse">Nouvelle adresse</option>
@foreach($adresses as $id => $adresse)
    <option value="{{ $id }}">{{ $adresse["nom"] }}</option>
@endforeach
  </select>
@endempty
  <br>
  <input type="submit" name="valider" value="Valider">
</form>

@include("layouts/footer")
