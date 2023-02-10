<?php
 $user                   = $this->d['user'];
 $stats = $this->d['stats'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
</head>
<body>
    
    <?php include('panel.php');?>
    <div id="main-container">
        <?php
            $this->showMessages();
         ?>
          <h2 align="center">Bienvenido</h2>
        <div  id="dashboard-container" >
        <div id="panels-container">
                    <div class="panel">
                        <div class="title">USUARIOS</div>
                        <div class="datum"><?php echo $stats['count-users']; ?></div>
                        <div class="description">Usuarios registrados</div>
                    </div>
                    <div class="panel">
                        <div class="title">Sucursales</div>
                        <div class="datum"><?php echo $stats['count-sucursals']; ?></div>
                        <div class="description">Sucursales registradas</div>
                    </div>
                
                    <div class="panel">
                        <div class="title">Laboratorios</div>
                        <div class="datum"><?php echo $stats['count-laboratorios']; ?></div>
                        <div class="description">Laboratorios registrados</div>
                    </div>
                    <div class="panel">
                        <div class="title">Medicinas</div>
                        <div class="datum"><?php echo $stats['count-medicinas']; ?></div>
                        <div class="description">Medicinas registradas</div>
                    </div>
                
                </div>
            
            
            
        </div>
    </div>
</body>
</html>