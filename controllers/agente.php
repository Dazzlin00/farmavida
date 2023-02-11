
<?php

class Agente extends SessionController{
 private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        
        $this->view->render('agente/index', [
            'user'                 => $this->user
        ]);
    }


 

    




    







}
?>