@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2>Commande</h2>
  <h3>Erreurs</h3>
  <ul>
    @foreach($erreurs as $erreur)
      <li>{{$erreur}}</li>
    @endforeach
  </ul>
</main>

@include("layouts/footer")
