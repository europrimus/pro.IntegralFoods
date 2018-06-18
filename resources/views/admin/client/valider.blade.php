@include("layouts/head")
@include("layouts/nav")

<main class="container">
  <h2 class="admin>">Espace d'administration</h2>
  <h3>Validation d'un client</h3>
  <p>Client : {{ $client["entreprise"] }}</p>
  <h3>Choix des produits</h3>

  @empty($listeProduits)
    <li>Pas de produit.</li>
  @else
    <form method="post" name="creerCatalogue" action="{{ URL::route('admin.client.validerPrix') }}">
      @csrf
      <table id="creerCatalogue" class="table table-hover">
      <thead class="thead-light">
        <tr >
          <th scope="col"></th>
          <th scope="col">Produit</th>
          <th scope="col">Code bare EAN</th>
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
      <input type="submit" name="valider" value="Valider">
    </form>
  @endempty
</main>

@include("layouts/footer")
