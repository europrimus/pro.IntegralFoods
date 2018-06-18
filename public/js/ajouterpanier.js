//ajouter l'article au panier
jQuery( ".catalogueclient button" ).click(function() {
    let idArticle = $(this).parent().find('input').data("id");
    let quantite = $(this).parent().find('input').val();
    // console.log(quantite);
    jQuery.get("/panier/ajouter/"+idArticle+"x"+quantite);
    $(this).parent().find('input').val(''); 
})

//ajouter un message quand on ajout un article
jQuery(function(){
    $('.catalogueclient button').click(function(){
       $('#message').show(0).delay(3000).hide(0);
    });
 });