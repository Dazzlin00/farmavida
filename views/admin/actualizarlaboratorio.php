<?php

$laboratorios = $this->d['laboratorios'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmavida</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
</head>
<body>
<?php include('panel.php');?>

    <div id="main" class="container d-flex justify-content-center align-items-center">
    <div>
    <br><h1 class="center">Actualización de <?php echo $this->laboratorio->nombremed ?></h1><br>

        <form action="<?php echo constant('URL'); ?>consultalaboratorio/actualizarMedicina" method="POST">

            <p>
                <label for="codMedicina">Código de Medicina: </label><br>
                <input type="text" name="codMedicina"  value="<?php echo $this->laboratorio->codMedicina ?>" required>
            </p>
           
            <p>
                <label for="nombre">Nombre de Medicina: </label><br>
                <input type="text" name="nombre"  value="<?php echo $this->laboratorio->nombremed ?>" required>
            </p>
            <p>
                <label for="codlab">Código Laboratorio disponible: </label><br>
                <input type="text" name="codlab"  value="<?php echo $this->laboratorio->codlab ?>" disabled>
            </p>
            <p>
                <label for="codlab2">Código del laboratorio a modificar: </label>
                <select style="width:125px" name="codlab2" class="custom-select">
                    <option value="">Seleccione</option>
                    <?php

                    foreach ($laboratorios as $laboratorio) {
                        echo "<option value=$laboratorio >" . $laboratorio . "</option>";
                    }
                    ?>
                </select>

            </p>
            <p>
                <label for="nombrelab">Nombre Laboratorio: </label><br>
                <input type="text" name="nombrelab"  value="<?php echo $this->laboratorio->nombre ?>" required>
            </p>
           

            <p>
            <input class="btn btn-primary" type="submit" value="Actualizar">
            <td><a class="btn btn-secondary" href="<?php echo constant('URL'); ?>consultalaboratorio">Cancelar</a></td>
            </p>

        </form>
        <div class="center alert alert-success" role="alert">
                <?php echo $this->mensaje; ?>
        </div>
    </div>
    </div>

  
</body>
</html>