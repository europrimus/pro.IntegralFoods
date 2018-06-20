jQuery("#etablissement").on("change", function() {
  if(jQuery("#etablissement").val() != 'autre') {
    jQuery("#autre").addClass( "cacher" ).find("input").prop('required',false);
  } else {
    jQuery("#autre").removeClass( "cacher" ).find("input").prop('required',true);
  }
})
