jQuery( ".catalogueclient button" ).click(function() {
    let idArticle = $(this).parent().find('input').data("id");
    let quantite = $(this).parent().find('input').val();
    // console.log(quantite);
    jQuery.get("/panier/ajouter/"+idArticle+"x"+quantite);
    $(this).parent().find('input').val(''); 
})





    $(".catalogueclient button").click(function () {
        if ($("#qte").val().length > 0) {
            $("#message")
                .text("test reussi")
                .fadeIn(3000, function () {
                    $(this).fadeOut(3000, function () {
                        sendMail();
                    });
                });
        }
        else {
            $("#nom")
                .next(".error-message")
                .fadeIn(800)
                .text("Entrer un nom");
        }
        return false;
    });

