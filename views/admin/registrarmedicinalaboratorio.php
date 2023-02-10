<?php
$medicinas = $this->d['medicinas'];
$laboratorios = $this->d['laboratorios'];

?>
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
        <h1 class="center">Registro de Medicinas por Laboratorio</h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>consultalaboratorio/registrarmedicinaslaboratorio" method="POST">

        

            <p>
                <label for="codMedicina">Codigo de las medicinas</label>
                <select style="width:125px" name="codMedicina" class="custom-select">
                    <option value="">Seleccione</option>
                    <?php

                    foreach ($medicinas as $medicina) {
                        echo "<option value=$medicina >" . $medicina . "</option>";
                    }
                    ?>
                </select>

            </p>
            <p>
                <label for="codlab">Codigo de la Sucursal</label>
                <select style="width:125px" name="codlab" class="custom-select">
                    <option value="">Seleccione</option>
                    <?php

                    foreach ($laboratorios as $laboratorio) {
                        echo "<option value=$laboratorio >" . $laboratorio . "</option>";
                    }
                    ?>
                </select>

            </p>
           
            

            <p>
            <input type="submit" value="Registrar">
            </p>

        </form>
    </div>

  
</body>
</html>