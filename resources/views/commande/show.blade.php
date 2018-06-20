@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2>Commande</h2>
    <h3>Détails d'une Commande</h3>
      <p>Commande N° : {{ $id }}<br>
        Statut de la commande : {{ $commande->Status }}
      </p>

@include("layouts.BonCommande")

</main>

@include("layouts/footer")
