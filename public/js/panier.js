// le decompte avant une mise à jour du panier vers le serveur
let timeout

// on surveil les changement de quantitée
jQuery("#panier").on("change", "input", function(event){
  //console.warn("quantité modifié");
  clearTimeout(timeout);
  //console.log(event);
  let $article = jQuery( this );
  let quantite = $article.val();
  //let idArticle = $article.attr("id").split("_",2)[1];
  let prixUnitaire = $article.attr("data-prixUnitaire");
  let prixTotal = prixUnitaire * quantite;
  //let prixUnitaire = $article.parents("tr").find('[data-title="Prix"]');
  //console.log( "quantite : ", quantite, "idArticle : ", idArticle, "prixUnitaire : ", prixUnitaire );
  $article.parents("tr").find('[data-title="Total"]').children(".prix")
    .text( new Intl.NumberFormat('fr-FR',{ minimumFractionDigits: 2 }).format(prixTotal) );
  $article.parents("tr").addClass('modifie');
  jQuery("#prixTotal").text( new Intl.NumberFormat('fr-FR',{ minimumFractionDigits: 2 }).format( SumPrixTotal() ) );
  //  si rien dans x seconde on sauvegarde
  timeout = setTimeout(modifPanier, 2000);
})

// calcul le total du panier
function SumPrixTotal(){
  //console.warn("SumPrixTotal");
  let $liste = jQuery('[data-title="Total"]'); //jQuery("td .prix");
  let prixTotal=0;
  $liste.each(function(  ){
    prixTotal += parseFloat(this.innerText.replace(/\s/g, '').replace(/,/g, '.'));
  });
  //console.log( "prixTotal : ", prixTotal );
  return prixTotal;
}

// met a jour le panier coté serveur
function modifPanier(){
  //console.warn("modifPanier");
  let $liste = jQuery(".modifie");
  let rechercheId = new RegExp('[0-9]+');
  $liste.removeClass("modifie");
  $liste.each(function(){
    let idArticle = jQuery(this).find("input").attr("id").match( rechercheId )[0] ;
    let quantite = jQuery(this).find("input").val();
    //console.log( "quantite : ", quantite, "idArticle : ", idArticle );
    jQuery.get( "/panier/modifier/"+idArticle+"x"+quantite );
  })
}

// ajouter une adresse
jQuery("#adresseLivraison").on("change", function() {
  if(jQuery("#adresseLivraison").val() != 'nouvelleAdresse') {
    jQuery("#nouvelleAdresse").addClass( "cacher" ).find("input").prop('required',false);
  } else {
    jQuery("#nouvelleAdresse").removeClass( "cacher" ).find("input").prop('required',true);
  }
})
