<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <meta name="viewport" content="width=device-width">
    <title>PIF Fisca</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="funciones.js"></script>
    
  </head>
  <body>
    <div class="container">
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Bienvenido</h1>
<p class="lead">En este pequeño sistema podrás ingresar ejercicios usando los métodos: Newton, Falsa Posición, Secante y Bisección.</p>
        <p class="lead">Primero debes ingresar la cantidad de cargas que deseas operar.</p>
         </div>
          <form  method="post" id="data">
            <div class="mb-3">
<select class="form-select" aria-label="Default select example" id="metodo" name ="metodo">
  <option selected value="">Seleccione metodo</option>
  <option value="1">Potencial Carga discreta</option>
  <option value="2">Potencial Carga continua</option>
</select>
   <!--<input type="text" name="expresion" class="form-control"> -->
  </div>
          
          <div id="contenedorInputs">

          
            
          </div>
            <div class="mb-3">
    <button type="button" class="btn btn-success form-control" value="Iniciar"onclick="validarMetodo()" >Enviar formulario</button>
          </div>
        </form>
    </div>
        
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
    <div id="divEspecifico"></div>
  </body>
</html>
