
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<?php include('panel.php');?>

    <div id="main">
        <h1 class="center">Actualizacion de </h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form  method="POST">

            <p>
                <label for="codMedicina">Codigo de Medicina</label><br>
                <input type="text" name="codMedicina"   disabled>
            </p>
           
            <p>
                <label for="nombre">Nombre de Medicina</label><br>
                <input type="text" name="nombre"   disabled>
            </p>
            <p>
                <label for="codlab">Codigo Laboratorio disponible</label><br>
                <input type="text" name="codlab"   disabled>
            </p>
            <p>
                <label for="codlab2">Codigo del laboratorio a modificar</label>
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
                <label for="nombrelab">Nombre Laboratorio</label><br>
                <input type="text" name="nombrelab"   disabled>
            </p>
           

            <p>
            <input type="submit" value="Actualizar">
            </p>

        </form>
    </div>

  
</body>
</html>