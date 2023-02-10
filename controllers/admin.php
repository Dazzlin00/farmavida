<?php

class Admin extends SessionController{
    private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();

    }

    function render(){
        
        $this->view->render('admin/index', [
            'user'                 => $this->user
        ]);
    }

}
?>