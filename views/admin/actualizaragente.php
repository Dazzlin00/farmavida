
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
        <br><h2 class="center">Datos de <?php echo $this->agentes->nombres ?></h2><br>
        <form action="<?php echo constant('URL'); ?>usuario/actualizar" method="POST">
        
           <p>
            <label for="codusuario">Código de Usuario:</label>
                <input type="text" name="codusuario" value="<?php echo $this->agentes->codusuario ?>" required>
            </p>


            <p>
                <label for="codsucu">Código de la Sucursal:</label>
                <input type="text" name="codsucu" value="<?php echo $this->agentes->codsucursal ?>" required>
            </p>
            <p>
                <label for="username">Nombre de usuario:</label>
                <input type="text" name="username"  value="<?php echo $this->agentes->username ?>" required>
            </p>
            <p>
                <label for="password">Contraseña:</label>
                <input type="text" name="password" value="<?php echo $this->agentes->password ?>" required>
            </p>
            <p>
                <label for="role">Rol de usuario:</label>
                <input type="text" name="role" value="<?php echo $this->agentes->role ?>" required>
            </p>
            <p>
                <label for="nombres">Nombres y Apellidos:</label>
                <input type="text" name="nombres" value="<?php echo $this->agentes->nombres ?>" required>
            </p>
        

            <p>
            <input class="btn btn-primary" type="submit" value="Actualizar">
            <td><a class="btn btn-secondary" href="<?php echo constant('URL'); ?>usuario">Cancelar</a></td>
            </p>

        </form>
            <div class="center alert alert-success" role="alert">
                <?php echo $this->mensaje; ?>
            </div>
    </div>
    </div>

  
</body>
</html>