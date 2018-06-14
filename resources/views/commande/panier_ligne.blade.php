<tr class="">
  <td class="">
    <a href="/panier/supprimer/{{ $ligne["catalogue_id"] }}" class="" aria-label="Enlever cet élément"
    data-product_id="905" data-product_sku="">&times;</a>
  </td>

  <td class="">
      <img width="200" height="200" src="/storage/photo/{{ $ligne["reference"] }}.png" class="" alt="" />
  </td>

  <td class="" data-title="Produit">
    <details><summary>{{ $ligne["produit"] }}</summary>
      {{ $ligne["description"] }}
    </details>
  </td>

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
        aria-labelledby="quantité de {{ $ligne["produit"] }}"
       class="" step="1" min="0" value="{{ $ligne["Quantité"] }}" title="Qté" size="2" pattern="[0-9]*"
       type="number" inputmode="numeric" data-prixUnitaire="{{ $ligne["prix"] }}"/>
    </div>
  </td>

  <td class="" data-title="Total">
    <span class="prix" >{{ number_format( $ligne["Quantité"]*$ligne["prix"], 2 , "," , " " ) }}</span><span class="">&euro;</span>
  </td>
</tr>
