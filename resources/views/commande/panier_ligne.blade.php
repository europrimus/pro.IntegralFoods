<tr class="">
  <td >
    <a href="/panier/supprimer/{{ $ligne["catalogue_id"] }}" class="remove" aria-label="Enlever cet élément" >×</a>
  </td>

  <td class="">
      <img width="200" height="200" src="/storage/photo/{{ $ligne["reference"] }}.png" class="" alt="" />
  </td>

  <th class="" data-title="Produit" scope="row">
    <details><summary>{{ $ligne["produit"] }}</summary>
      {{ $ligne["description"] }}
    </details>
  </th>

  <td class="" data-title="Conditionnement">
    {{ $ligne["conditionnement"] }}
  </td>

  <td class="" data-title="Référence">
    {{ $ligne["reference"] }}
  </td>

  <td class="" data-title="Prix">
    <span class="prix">{{ number_format( $ligne["prix"], 2 , "," , " " ) }}</span><span class="">&euro;</span>
  </td>

  <td class="" data-title="Quantité">
    <div class="quantity">
      <label class="screen-reader-text" for="quantity_{{ $ligne["catalogue_id"] }}"></label>
      <input id="quantity[{{ $ligne["catalogue_id"] }}]" name="quantity[{{ $ligne["catalogue_id"] }}]"
        aria-labelledby="quantité de {{ $ligne["produit"] }}" title="Qté"
        type="number" inputmode="numeric" step="1" min="0" value="{{ $ligne["Quantité"] }}" size="2" pattern="[0-9]*"
        data-prixUnitaire="{{ $ligne["prix"] }}" class="quantite" />
    </div>
  </td>

  <td class="" data-title="Total">
    <span class="prix" >{{ number_format( $ligne["Quantité"]*$ligne["prix"], 2 , "," , " " ) }}</span><span class="">&euro;</span>
  </td>
</tr>
