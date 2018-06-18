jQuery( "button" ).click(function() {
    let idArticle = $(this).parent().find('input').data("id");
    let quantite = $(this).parent().find('input').val();
    // console.log(quantite);
    jQuery.get("/panier/ajouter/"+idArticle+"x"+quantite);
    $(this).parent().find('input').val('');
    alert('ajouter au panier !');
})