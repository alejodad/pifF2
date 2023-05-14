<?php 
if(!empty($_POST)){
$metodo=$_POST["metodo"];

  //dependiendo del metodo seleccionado tomara el file  y llamara el comando
  switch ($metodo) {
  case 1:
    $file= dirname(__FILE__).'/potencialKD.py';
    echo returnComand($metodo,$file);
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
  if($metodo==1){
    $opc=1;
    //guardando inputs
    $val_c_r=unir_inputs($_POST['cantidad']);
    $cmd = "python";
    //creando argumentos del comando
    $args = [
    "$file",
    "$val_c_r[0]",
    "$val_c_r[1]",
    "$opc"
    ];
    $escaped_args = implode(" ", array_map("escapeshellarg", $args));
    //armando comando
    $command = "$cmd $escaped_args";
    return $command;
  }else{
    $valorX_puntoA=$_POST["input1"];
    $puntoB=$_POST["input2"];
    $tol=$_POST["input3"];
    $nVeces=$_POST["input4"];
    $cmd = "python";
    $args = [
    "$file",
    "$valorX_puntoA",
    "$puntoB",
    "$tol",
    "$nVeces",
    "$expresion"
    ];
    $escaped_args = implode(" ", array_map("escapeshellarg", $args));
    $command = "$cmd $escaped_args";
    return $command;
    
  }
}

function unir_inputs($cantidad) {
  $q = "";
  $r = "";
  for ($i = 1; $i <= $cantidad; $i++) {
    $carga = $_POST['carga'.$i];
    $potencia = $_POST['potenciaCarga'.$i];
    $q .= $carga.'e'.$potencia." ";
    $r .= $_POST['dCarga'.$i]." ";
    
  }
  // Retornar dos variables como un array
  return array($q, $r);
}

?>