<?php
$medicinas = $this->d['medicinas'];
$sucursals = $this->d['sucursals'];

?>
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
        <br><h1>Registro de Medicinas por sucursal</h1><br>
        <form action="<?php echo constant('URL'); ?>consulta/registrarmedicinassucursal" method="POST">

        

            <p>
                <label for="codMedicina">Código de las medicinas:</label>
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
                <label for="codSucursal">Código de la Sucursal:</label>
                <select style="width:125px" name="codSucursal" class="custom-select">
                    <option value="">Seleccione</option>
                    <?php

                    foreach ($sucursals as $sucursal) {
                        echo "<option value=$sucursal >" . $sucursal . "</option>";
                    }
                    ?>
                </select>

            </p>
            <p>
                <label for="cantidad">Cantidad: </label>
                <input type="text" name="cantidad"   required>
            </p>
            

            <p>
            <input class="btn btn-primary" type="submit" value="Registrar">
            </p>

        </form>
            <div class="center alert alert-success" role="alert">
                <?php echo $this->mensaje; ?>
            </div>
    </div>
    </div>
  
</body>
</html>