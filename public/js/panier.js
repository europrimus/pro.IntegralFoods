// on surveil les changement de quantitée
jQuery("#panier").on("change", "input", function(event){
  console.warn("quantité modifié");
  //console.log(event);
  let $article = jQuery( this );
  let quantite = $article.val();
  let idArticle = $article.attr("id").split("_",2)[1];
  let prixUnitaire = $article.attr("data-prixUnitaire");
  let prixTotal = prixUnitaire * quantite;
  //let prixUnitaire = $article.parents("tr").find('[data-title="Prix"]');
  console.log( "quantite : ", quantite, "idArticle : ", idArticle, "prixUnitaire : ", prixUnitaire );
  $article.parents("tr").find('[data-title="Total"]').children(".prix")
    .text( new Intl.NumberFormat('fr-FR',{ minimumFractionDigits: 2 }).format(prixTotal) );
});
