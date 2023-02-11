<?php
$sucursals = $this->d['sucursals'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <title>Farmavida</title>
</head>

<body>
    <?php include('panel.php'); ?>
    <div class="container d-flex justify-content-center align-items-center">
    <div>
        <br><h2>Registro de Usuarios</h2><br>
        <form action="<?php echo constant('URL'); ?>signup/newUser" method="POST">
        
            <p>
                <label for="codusuario">Código de usuario:</label>
                <input type="text" name="codusuario" required>
            </p>

            <p>
                <label for="codsucu">Código de la Sucursal:</label>
                <select style="width:125px" name="codsucu" class="custom-select">
                    <option value="">Seleccione</option>
                    <?php

                    foreach ($sucursals as $sucursal) {
                        echo "<option value=$sucursal >" . $sucursal . "</option>";
                    }
                    ?>
                </select>

            </p>


            <p>
                <label for="username">Nombre de usuario: </label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">Contraseña: </label>
                <input type="text" name="password" id="password">
            </p>
            <p>
                <label for="nombres">Nombres y Apellidos: </label>
                <input type="text" name="nombres" id="nombres">
            </p>
            <p>
                <input class="btn btn-primary" type="submit" value="Registrar" />
                <td><a class="btn btn-secondary" href="<?php echo constant('URL'); ?>usuario">Cancelar</a></td>
            </p>

        </form>
        
            <div class="center alert alert-success" role="alert">
            <?php $this->showMessages(); ?>
            </div>
    </div>
    </div>
</body>

</html>