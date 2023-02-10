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
        <br><h1>Detalle de <?php echo $this->sucursal->codSucursal ?></h1><br>

        <form action="<?php echo constant('URL'); ?>sucursals/actualizarSucursal" method="POST">

            <p>
                <label for="codSucursal">Código de la Sucursal: </label><br>
                <input type="text" name="codSucursal"  value="<?php echo $this->sucursal->codSucursal ?>" required>
            </p>
            <p>
                <label for="estado">Estado: </label><br>
                <input type="text" name="estado"  value="<?php echo $this->sucursal->estado ?>" required>
            </p>
            <p>
                <label for="ciudad">Ciudad: </label><br>
                <input type="text" name="ciudad" value="<?php echo $this->sucursal->ciudad ?>" required>
            </p>
            <p>
                <label for="direccion">Dirección: </label><br>
                <input type="text" name="direccion" value="<?php echo $this->sucursal->direccion ?>" required>
            </p>

            <p>
            <input class="btn btn-primary" type="submit" value="Actualizar">
            </p>

        </form>
            <div class="center alert alert-success" role="alert">
                <?php echo $this->mensaje; ?>
            </div>
    </div>
    </div>

  
</body>
</html>