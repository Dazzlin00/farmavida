<?php
 $user                   = $this->d['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    
</head>
<body>
<?php include('panel.php');?>
    <?php $this->showMessages();?>
    <div id="Agente">
        
        <h1>Agente: <?php echo $user->getNombres() ?></h1>
    </div>
</body>
</html>