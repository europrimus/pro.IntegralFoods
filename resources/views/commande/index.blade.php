@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2>Commande</h2>
  <h3>Liste des Commandes</h3>
  <ul>
    @foreach($listeCommande as $commande)
      <li>{{$commande["date"]}} - {{$commande["facture"]}}</li>
    @endforeach
  </ul>
</main>

@include("layouts/footer")
