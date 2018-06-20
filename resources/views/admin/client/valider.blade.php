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

  <form method="post" name="creerCatalogue" action="{{ URL::route('admin.client.validerPrix') }}">
    <h3>Validation d'un client</h3>
    <p>Client : {{ $client["entreprise"] }}</p>
    <label for="loginClient">Identifiant client : </label>
      <input name="loginClient" id="loginClient" type="text" value=""><br>
    <label for="mdpClient">Mot de passe client : </label>
      <input name="mdpClient" id="mdpClient" type="text" value=""><br> 
    <label for="Siret">N° Siret : </label> 
      <input name="Siret" id="Siret" type="text" value="">
    <h3>Choix des produits</h3>

    @empty($listeProduits)
      <li>Pas de produit.</li>
    @else
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
              <details><summary>{{ $produit->titre }}</summary>
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
              <label class="screen-reader-text" for="prix[{{ $produit->id }}]"></label>
              <input id="prix[{{ $produit->id }}]" name="prix[{{ $produit->id }}]"
                aria-labelledby="prix de {{ $produit->titre }}" title="prix"
                type="number" inputmode="numeric" step="0.01" min="0" value="" class="prix" />€
            </td>
          </tr>
          @endforeach
        </table>

    @endempty
    <input type="submit" name="valider" value="Valider">
  </form>
</main>

@include("layouts/footer")
