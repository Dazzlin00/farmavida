
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmavida</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    table {
      background-color: white;
    }
    .barra {
   background-color: black;
    }
    </style>
</head>

<body>
  <?php include('panel.php'); ?>
  <center>
    <h3>Lista de Medicinas</h3>
  </center>

  <div class="container">
 
    <form action="" method="post">
      <div class="panel panel-default">
        <div class="panel-body ">
              <a class="btn btn-primary" href="<?php echo constant('URL') .'consulta/pantallaregistro/' ; ?>"> Registrar medicina </a>
              <a class="btn btn-primary" href="<?php echo constant('URL') .'consulta/pantallaregistroporSucursal/' ; ?>"> Suministrar inventario </a>
              <div><br></div>

          <table class="table table-bordered table-hover dt-responsive nowrap">
            <thead class="barra text-white" >
              <tr align="center">
                <th>Código de la medicina</th>
                <th>Nombre</th>

                <th>Cantidad Total por Medicina</th>


              </tr>
            </thead>
            <tbody>
              <?php
              include_once 'models/medicina.php';
              // Recorrer los resultados y agregarlos a la tabla
              
              foreach ($this->medicina as $row) {
                $medicinas = new Medicina();
                $medicinas = $row;



                ?>

                <tr align="center">
                  <td>
                    <?php echo $medicinas->codigo ?>
                  </td>
                  <td>
                    <?php echo $medicinas->nombre ?>
                  </td>
                  <td >
                    <?php echo $medicinas->cantidad ?>
                  </td>
                  <td><a class="btn btn-success" href="<?php echo constant('URL') . 'consulta/verMedicina/' . $medicinas->codigo; ?>">Actualizar</a></td>
                  <td><a class="btn btn-danger" href="<?php echo constant('URL') . 'consulta/eliminar/' . $medicinas->codigo; ?>">Eliminar</a>

                                    
                </tr>
                
                
              <?php } ?>
            </tbody>
            
          </table>
        </div>
      </div>
  </div>

</body>

</html>