<?php 
if(!empty($_POST)){
  //guardando los valores de los inputs
$metodo=$_POST["metodo"];

  


//dependiendo del metodo seleccionado tomara el file  y llamara el comando
  switch ($metodo) {
  case 1:
    $file= dirname(__FILE__).'/potencialKD.py';
    exec(returnComand($metodo,$file), $output);
    echo implode("\n", $output);
    break;
  case 2:
    $file= dirname(__FILE__).'/potencialKC.py';
    exec(returnComand($metodo,$file), $output);
    echo implode("\n", $output);
    break;
  default:
    echo "Opción no válida";
  }
   
  

}

//metodo para retornar el comando de shell
function returnComand($metodo,$file){
  $command="";
  $cmd = "python";
  if($metodo==1){
    
    //este array captura la el retorno de la funcion
    $argumento_c_r= (unir_inputs(($_POST['cantidad'])));
    $opc = isset($_POST['verTodo']) ? 1 : 0;
    //creando argumentos del comando
    $args = [
    "$file",
    "$argumento_c_r[0]",
    "$argumento_c_r[1]",
    "$opc"
    ];
    $escaped_args = implode(" ", array_map("escapeshellarg", $args));
    //armando comando
    $command = "$cmd $escaped_args";
    return $command;
    
  }else{
    $lamda =$_POST['lambda']."e".$_POST['potenciaCarga1'];
    $r=$_POST['radio'];
    $l=$_POST['distancia'];
    $args = [
    "$file",
    "$lamda",
    "$r",
    "$l"
    ];
    $escaped_args = implode(" ", array_map("escapeshellarg", $args));
    $command = "$cmd $escaped_args";
    return $command;
    
  }
}

//esta funcion crea una cadena que hara de arreglo para py
  function unir_inputs($cantidad) {
    //definidneo variables
  $q = "";
  $r ="";
    //se recorre segun la cantidad de cargas del input
  for ($i = 1; $i <= $cantidad; $i++) {
    //creandao array q
    $carga = $_POST['carga'.$i];
    $potencia = $_POST['potenciaCarga'.$i];
    //seteando valor segun se pide en py
    $resultado = $carga.'e'.$potencia;
    $q .= $resultado." ";
    // creando array r
    $dCarga = $_POST['dCarga'.$i];
    $r .= $dCarga." ";
  }
    //se devuelven las dos cadenas en un array
    return array($q,$r);
  }

?>