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
            <br><h1 class="center">Registrar Sucursal </h1><br>

        <form action="<?php echo constant('URL'); ?>sucursals/registrar" method="POST">

            <p>
                <label for="codSucursal">Código de Sucursal: </label><br>
                <input type="text" name="codSucursal"   required>
            </p>
            <p>
                <label for="estado">Estado: </label><br>
                <input type="text" name="estado"   required>
            </p>
            <p>
                <label for="ciudad">Ciudad: </label><br>
                <input type="text" name="ciudad"  required>
            </p>
            <p>
                <label for="direccion">Dirección: </label><br>
                <input type="text" name="direccion"  required>
            </p>

            <p>
            <input class="btn btn-primary" type="submit" value="Registrar">
            <td><a class="btn btn-secondary" href="<?php echo constant('URL'); ?>sucursals">Cancelar</a></td>
            </p>

        </form>
            <div class="center alert alert-success" role="alert">
                <?php echo $this->mensaje; ?>
            </div>
    </div>
    </div>

  
</body>
</html>