
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
        <br><h1>Datos de medicina: <?php echo $this->medicina->nombre ?></h1><br>

        <form action="<?php echo constant('URL'); ?>consulta/actualizarMedicina" method="POST">

            <p>
                <label for="codMedicina">Codigo de Medicina</label><br>
                <input type="text" name="codMedicina"  value="<?php echo $this->medicina->codigo ?>" required>
            </p>
           
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre"  value="<?php echo $this->medicina->nombre ?>" required>
            </p>
           

            <p>
            <input class="btn btn-primary" type="submit" value="Actualizar">
            <td><a class="btn btn-secondary" href="<?php echo constant('URL'); ?>consulta">Cancelar</a></td>
            </p>

        </form>
        <div class="center alert alert-success" role="alert">
            <?php echo $this->mensaje; ?>
        </div>
    </div>
    </div>

  
</body>
</html>