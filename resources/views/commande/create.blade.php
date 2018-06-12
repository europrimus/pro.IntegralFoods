@include("layouts/head")
@include("layouts/nav")

<h2>Commande</h2>
<h3>Contenu du panier</h3>

@empty($lignes)
  <p>Le panier est vide</p>
@else
  <table>
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
  <a href="{{ URL::to('/panier/toutSupprimer') }}">Vider le panier</a> |
  <a href="{{ URL::to('/panier') }}">Recalculer</a>
@endempty
<h3>Nouvelle commande</h3>

<a href="">Valider</a>

@include("layouts/footer")
