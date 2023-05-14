$(document).ready(function(){
  $('#metodo').change(function() {
    var seleccion = $(this).val();
    var contenedorInputs = $('#contenedorInputs');
    contenedorInputs.empty();
    if (seleccion == 1) { 
      contenedorInputs.append('<div class="mb-3"><label for="cantidad" class="form-label" >Cantidad de cargas</label><input type="number" id="cantidad" name="cantidad" class="form-control"  min="2" required></div><div id="cant"></div>');

    }
    else{
      contenedorInputs.append('<div class="mb-3"><div class="row"><div class="col-6 pe-0"><label class="form-label" for="lambda">Lambda:</label><input type="number" name="lambda" id="lambda" class="form-control text-end pe-0" step="0.0001" required=""></div>  <div class="col-1 pt-4 ps-0 pe-0">    <label class="form-label" for=""></label><span class="input-group-text" id="">^</span></div><div class="col-5 ps-0"><label class="form-label" for="potenciaCarga1">Potencia Lmabda:</label><input type="number" name="potenciaCarga1" id="potenciaCarga1" class="form-control text-end " step="0.0001" required=""></div></div></div><div class="mb-3"><label for="radio" class="form-label" >Radio</label><input type="number" id="radio" name="radio" class="form-control text-end "  " required></div><div class="mb-3"><label for="distancia" class="form-label" >Distancia</label><input type="number" id="distancia" name="distancia" class="form-control text-end "  required></div>');
      
    }

          
  $('input[name="cantidad"]').on('change', function() {
        var cantidad = $(this).val();
       
      var contenedorInputsC = $('#cant');
    contenedorInputsC.empty();
     // Limpiar cualquier input previamente generado
    contenedorInputsC.append('<div class="pricing-header px-3 py-3 pb-md-4 mx-auto text-center"><p class="lead">Genial ahora indicanos los valores de las cargas en Coulombs y su distancia en metros</p></div>');
        for (var i = 1; i <= cantidad; i++) {
           contenedorInputsC.append('<div class="row pb-3"><div class="col-md-6"><div class="row"><div class="col-6 pe-0"><label class="form-label" for="carga' + i + '">Carga ' + i + ':</label><input type="number" name="carga' + i + '" id="carga' + i + '" class="form-control text-end pe-0" step="0.0001" required=""></div>  <div class="col-1 pt-4 ps-0 pe-0">    <label class="form-label" for=""></label><span class="input-group-text" id="">^</span></div><div class="col-5 ps-0"><label class="form-label" for="potenciaCarga' + i + '">Potencia Carga ' + i + ':</label><input type="number" name="potenciaCarga' + i + '" id="potenciaCarga' + i + '" class="form-control text-end " step="0.0001" required=""></div></div></div><div class="col-md-6"><label class="form-label" for="dCarga' + i + '">Distancia carga ' + i + ':</label><input type="number" name="dCarga' + i + '" id="dCarga' + i + '" class="form-control text-end " step="0.0001" required></div></div>');
        }
    contenedorInputsC.append('<div class="pricing-header px-3 py-3 pb-md-4 mx-auto text-center"><p class="lead">Por último indica si deseas ver el potencial por cada carga</p></div>');
    });
    });
      
});


function validarMetodo(){
  var miSelect = $('#metodo');
  if (miSelect.val() === '') {Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Debe seleccionar el metodo!'
})
    return;
  }else if (verificarInputs()){
    $.post("procesaResultado.php", $("#data").serialize(), function(data){
      Swal.fire(data);
         //$('#divEspecifico').html(data);
     });
  }
}


function verificarInputs() {
  // Obtener todos los inputs de la página
  const inputs = document.querySelectorAll('input');
  
  // Verificar si todos los inputs tienen un valor
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value === '') {
      Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Debe completar todos los campos antes de continuar!'
})
      return false;
    }
  }
  
  // Si todos los inputs tienen un valor, continuar con la ejecución
  return true;
}

