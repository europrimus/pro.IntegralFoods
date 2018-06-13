<tr class="">
  <td class="">
    <a href="/panier/supprimer/{{ $ligne["id"] }}" class="" aria-label="Enlever cet élément"
    data-product_id="905" data-product_sku="">&times;</a>
  </td>

  <td class="">
    <a href="">
      <img width="400" height="400" src="img/produit/mini{{ $ligne["img"] }}" class="" alt="" /></a>
  </td>

  <td class="" data-title="Produit">
    <a href="/produit/{{ $ligne["id"] }}">{{ $ligne["produit"] }}</a>
  </td>

  <td class="" data-title="Prix">
    <span class="prix">{{ $ligne["prix"] }}</span><span class="">&euro;</span>
  </td>

  <td class="" data-title="Quantité">
    <div class="quantity">
      <label class="screen-reader-text" for="quantity_{{ $ligne["id"] }}"></label>
      <input id="quantity[{{ $ligne["id"] }}]" name="quantity[{{ $ligne["id"] }}]"
        aria-labelledby="quantité de {{ $ligne["produit"] }}"
       class="" step="1" min="0" value="{{ $ligne["Quantité"] }}" title="Qté" size="2" pattern="[0-9]*"
       type="number" inputmode="numeric" data-prixUnitaire="{{ $ligne["prix"] }}"/>
    </div>
  </td>

  <td class="" data-title="Total">
    <span class="prix" >{{ number_format( $ligne["Quantité"]*$ligne["prix"], 2 , "," , " " ) }}</span><span class="">&euro;</span>
  </td>
</tr>
