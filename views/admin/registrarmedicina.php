<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmavida</title>
    
</head>
<body>
<?php include('panel.php');?>
    
    <div id="main" class="container d-flex justify-content-center align-items-center">
    <div> 
    <br><h1>Registrar Medicinas </h1><br>

        <form action="<?php echo constant('URL'); ?>consulta/registrar" method="POST">

            <p>
                <label for="codMedicina">Código de la Medicina: </label><br>
                <input type="text" name="codMedicina"   required>
            </p>
            <p>
                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre"   required>
            </p>
           
            <p>
            <input class="btn btn-primary" type="submit" value="Registrar">
            <td><a class="btn btn-secondary" href="<?php echo constant('URL'); ?>consulta">Cancelar</a></td>

            </p>
                <div class="center alert alert-success" role="alert">
                <?php echo $this->mensaje; ?>
                </div>
        </form>
    </div>
    </div>
  
</body>
</html>