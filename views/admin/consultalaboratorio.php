
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
</head>

<body>
  <?php include('panel.php'); ?>
  <center>
    <h3>Lista de Medicinas por Laboratorio</h3>
  </center>

  <div class="container">
 
    <form action="" method="post">

      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr align="center">
                <th>Código de la medicina</th>
                <th>Nombre de la medicina</th>
                <th>Código del laboratorio</th>
                

                <th>Nombre del Laboratorio</th>


              </tr>
            </thead>
            <tbody>
              <?php
              include_once 'models/laboratorio.php';
              // Recorrer los resultados y agregarlos a la tabla
              
              foreach ($this->laboratorio as $row) {
                $laboratorios = new Laboratorio();
                $laboratorios = $row;



                ?>

                <tr align="center">
                  <td>
                    <?php echo $laboratorios->codMedicina ?>
                  </td>
                  <td>
                    <?php echo $laboratorios->nombremed ?>
                  </td>
                  <td>
                    <?php echo $laboratorios->codlab ?>
                  </td>
                  
                  <td >
                    <?php echo $laboratorios->nombre ?>
                  </td>
                  <td><a href="<?php echo constant('URL') . 'consultalaboratorio/verMedicina/' . $laboratorios->codMedicina; ?>">Actualizar</a></td>
                  <td><a href="<?php echo constant('URL') . 'consultalaboratorio/eliminar/' . $laboratorios->codMedicina; ?>">Eliminar</a></td>
                </tr>
                
                
              <?php } ?>
              
              <a href="<?php echo constant('URL') .'consultalaboratorio/pantallaregistro/' ; ?>"> Registrar </a>
              <a href="<?php echo constant('URL') .'consultalaboratorio/pantallaregistroporlaboratorio/' ; ?>"> Registrar medicinas </a>
            </tbody>
          </table>
        </div>
      </div>
  </div>

</body>

</html>