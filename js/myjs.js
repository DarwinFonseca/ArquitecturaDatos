$(document).ready(
        function () {
            tipoVehiculo();
        }
);

function tipoVehiculo() {
  $('#utilitario').hide();
  $("#tipo").change(function(){
    if($(this).val()=="Todo Terreno"){
      $("#utilitario").hide();
      $("#todoterreno").show();
    }
    else {
      $("#todoterreno").hide();
      $("#utilitario").show();
    }
  });
}
