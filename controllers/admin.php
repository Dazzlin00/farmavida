<?php
//DASHBOARD DE EL ADMINISTRADOR
class Admin extends SessionController{
    private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();

    }
//SE ENCARGA DE MOSTRAR LAS VISTAS
    function render(){
        $stats = $this->getStatistics();
        
        $this->view->render('admin/index', [
            'user'                 => $this->user,
            "stats" => $stats
        ]);
    }


//MUESTRA LAS ESTADISTICAS EN EL ADMI
    private function getStatistics(){
        $res = [];

        $userModel = new UsuarioModel();
        $users = $userModel->getAll();
      
        $sucursalsmodel = new SucursalsModel();
        $sucursals = $sucursalsmodel->get();
       
       
        $laboratoriomodel = new ConsultaLaboratorioModel();
        $laboratorios = $laboratoriomodel->getAllLaboratorio();
      
        $consultamodel = new ConsultaModel();
        $medicinas = $laboratoriomodel->getAllMedicina();
    
        $res['count-users'] = count($users);
        $res['count-sucursals'] = count($sucursals);
        $res['count-laboratorios'] = count($laboratorios);
        $res['count-medicinas'] = count($medicinas);
        return $res;
    }

}
?>