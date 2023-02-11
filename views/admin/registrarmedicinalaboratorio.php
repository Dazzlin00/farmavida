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

    <div id="main" class="container d-flex justify-content-center align-items-center">
    <div>
        <br><h1>Registro de Medicinas por Laboratorio</h1><br>

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
            <input class="btn btn-primary" type="submit" value="Registrar">
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