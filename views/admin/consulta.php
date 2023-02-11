
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
                  <td><a class="btn btn-danger text-white" data-toggle="modal" data-target="#confirmModal" >Eliminar</a>

                                      <!-- Modal de confirmación -->
                                      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              ¿Está seguro de que desea eliminar esta medicina?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                              <a class="btn btn-danger" href="<?php echo constant('URL') . 'consulta/eliminar/' . $medicinas->codigo; ?>">Eliminar</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                </tr>
                
                
              <?php } ?>
            </tbody>
            
          </table>
        </div>
      </div>
  </div>

</body>

</html>