$(document).ready(function(){
  $("#selectall").change(function(){
    $(".checkbox1").prop('checked', $(this).prop("checked"));
      if ($('#selectall').is(':checked')) {
        $( ".checkbox1" ).prop( "checked", true );
        // $( ".checkboxli" ).hide();
        //$(".checkbox1").prop('checked', $(this).prop("checked"));
      } else {
        $(".checkbox1").prop('checked', $(this).prop("checked"));
        $( ".checkboxli" ).show();
      }
  });

  if ($('#selectall').is(':checked')) {
    $('.checkbox1').each(function() {
        this.checked = true;                        
    });
    // $( ".checkboxli" ).hide();
    //$(".checkbox1").prop('checked', $(this).prop("checked"));
  } else {
    $(".checkbox1").prop('checked', $(this).prop("checked"));
    $( ".checkboxli" ).show();
  }

  $(".checkbox1").change(function(){
      $( "#selectall" ).prop( "checked", false );
  });

    

});