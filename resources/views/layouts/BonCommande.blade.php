<button onclick="window.print();" class="btn">Imprimer</button>

<section id="bonCommande">
  <header>
    <div id="expediteur">
      <img src="/img/Logo-integralFoods.png" alt="logo">
      <p>{{ $commande->Fournisseur->Entreprise }}<br>
        {{ $commande->Fournisseur->Adresse->Adresse }}<br>
        {{ $commande->Fournisseur->Adresse->CodePostal }} {{ $commande->Fournisseur->Adresse->Ville }}<br>
        Tél : {{ $commande->Fournisseur->Tel }}<br>
        e-mail : {{ $commande->Fournisseur->email }}<br>
      </p>
    </div>

    <div id="adresseFacturation" class="adresse">
      <h2>Adresse facturation</h2>
      <p>{{ $commande->Client->Entreprise }}<br>
        {{ $commande->Client->Facturation->Adresse }}<br>
        {{ $commande->Client->Facturation->CodePostal }} {{ $commande->Client->Facturation->Ville }}
      </p>
    </div>

    <div id="adresseLivraison" class="adresse">
      <h2>Adresse livraison</h2>
      <p>{{ $commande->Client->Entreprise }}<br>
        {{ $commande->Client->Livraison->Adresse }}<br>
        {{ $commande->Client->Livraison->CodePostal }} {{ $commande->Client->Livraison->Ville }}
      </p>
    </div>

    <div id="infoCommande">
      <h2>Bon de commande</h2>
      <p>N° {{ $commande->commande->NumCommande }}<br>
      Le {{ $commande->commande->Date }}</p>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr >
          <th class="produit">Produit</th>
          <th class="ean">Code barre EAN</th>
          <th class="ref">Référence</th>
          <th class="prix">Prix</th>
          <th class="quantite">Qté</th>
          <th class="total">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($commande->produits as $produit)
          <tr>
            <td class="produit">{{ $produit->Nom }}</td>
            <td class="ean">{{ $produit->ean }}</td>
            <td class="ref">{{ $produit->Reference }}</td>
            <td class="prix">{{ number_format( floatval($produit->PrixUnitaire), 2 , "," , " " ) }} €</td>
            <td class="quantite">{{ $produit->Quantite }}</td>
            <td class="total">{{ number_format( floatval($produit->PrixTotal), 2 , "," , " " ) }} €</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <p>Total à payer : {{ number_format( floatval($commande->commande->PrixTotal), 2 , "," , " " ) }} €</p>
  </main>
  <footer>
    {{ $commande->Fournisseur->Entreprise }}&nbsp;&nbsp;-&nbsp;&nbsp;
    N° SIRET : {{ $commande->Fournisseur->Siret }}&nbsp;&nbsp;-&nbsp;&nbsp;
    N° TVA : {{ $commande->Fournisseur->TVA }}
  </footer>
</section>
