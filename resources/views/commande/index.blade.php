@include("layouts/head")
@include("layouts/nav")
<h2>Commande</h2>
<h3>Liste des Commandes</h3>
<ul>
  @foreach($listeCommande as $commande)
    <li>{{$commande}}</li>
  @endforeach
</ul>
</ul>
@include("layouts/footer")
