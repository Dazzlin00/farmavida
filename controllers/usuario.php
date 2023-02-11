<?php
// CONTROLA A LOS USUARIOS
class Usuario extends SessionController
{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        $this->view->agentes = [];
    }
//MUESTRA LA VISTA CONSULTAR AGENTE
    function render()
    {
       
        $this->view->render('admin/consultaragente', [
          
            'agentes' => $this->getListAgentes()
        ]);
    }
  //MUESTRA LA LISTA DE AGENTES
    private function getListAgentes(){
        $res = [];
        $usuariomodel = new UsuarioModel();
        $agentes = $usuariomodel->getAll();

        foreach ($agentes as $agente) {
         
          $agentesArray = [];
          $agentesArray['agente'] = $agente;
         
          array_push($res, $agentesArray);

        }
    

        return $res;
    }
//MUESTRA EN OTRA VENTANA LA PANTALLA DE ACTUALIZACION

    function verAgente($param = null)
    {
        $codusuario = $param[0];
        $agentes = $this->model->getById($codusuario);


        $this->view->agentes = $agentes;
        $this->view->mensaje = "";
        $this->view->render('admin/actualizarAgente');
    }
//ACTUALIZA
    function actualizar()
    {
        $codusuario = $_POST['codusuario'];
        $codsucursal = $_POST['codsucu'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
       
        $nombres = $_POST['nombres'];

        if ($this->model->update(['codusuario' => $codusuario, 'codsucu' => $codsucursal, 'username' => $username, 'password' => $password, 'role' => $role, 'nombres' => $nombres])) {
            
            $agentes = new Agentes();
            $agentes->codusuario = $codusuario;
            $agentes->codsucursal = $codsucursal;
            $agentes->username = $username;
            $agentes->password = $password;
            $agentes->role = $role;
            $agentes->nombres = $nombres;


            $this->view->agentes = $agentes;

            $this->view->mensaje = "Datos actualizados correctamente";

            $this->view->render('admin/actualizarAgente');
        } else {
            $this->view->mensaje = "No se pudo actualizar ";

        }

    }

//ELIMINA
    function delete($params){
        
        if($params === NULL) $this->redirect('usuario', ['error' => Errors::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        $cod = $params[0];
       
        $res = $this->model->delete($cod);

        if($res){
            $this->redirect('usuario', ['success' => Success::SUCCESS_EXPENSES_DELETE]);
        }else{
            $this->redirect('usuario', ['error' => Errors::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        }
    }


    
}

?>