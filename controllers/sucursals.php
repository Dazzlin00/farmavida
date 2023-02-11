<?php
//CONTROLA LA LISTA DE SUCURSALES
class Sucursals extends SessionController
{    private $user;

    function __construct()
    {
        parent::__construct();
                $this->user = $this->getUserSessionData();

        $this->view->sucursal = [];
    }
//MUESTRA LAS VISTAS
    function render()
    {
        $sucursals = $this->model->get();
        $this->view->sucursal = $sucursals;
        $this->view->render('admin/consultasucursal', [
            'user'                 => $this->user
           
        ]);;
    }
    //MUESTRA EN OTRA VENTANA 
    function verlistaMedicinas($param = null)
    {
        $this->view->render('admin/listamedicinas');
    }

    private function getListmedicinas($codsucursal){
        $res = [];
       
        $sucursalmodel = new SucursalsModel();
        $medicinas = $sucursalmodel->getAlls($codsucursal);

        foreach ($medicinas as $medicina) {
       
          $sucursalArray = [];
          $sucursalArray['medicina'] = $medicina;
         
          array_push($res, $sucursalArray);

        }
    

        return $res;
    }
//MUESTRA EN OTRA VENTANA LA PANTALLA DE REGISTRO
    function pantallaregistro()
    {
        $this->view->mensaje = "";
        $this->view->render('admin/registrarsucursal');
    }

    //METODO QUE REGISTRA
    function registrar(){
      
        $codSucursal = $_POST['codSucursal'];
        $estado    = $_POST['estado'];
        $ciudad  = $_POST['ciudad'];
        $direccion  = $_POST['direccion'];

        if($this->model->insert(['codSucursal' => $codSucursal, 'estado' => $estado, 'ciudad' => $ciudad,'direccion' => $direccion])){
            
           
            $this->view->mensaje = "Sucursal Registrada correctamente";
         
            $this->view->render('admin/registrarsucursal');
        }else
        
        {
            $this->view->mensaje = "La Sucursal ya está registrada";
            $this->view->render('admin/registrarsucursal');
        }
    }
    //MUESTRA EN OTRA VENTANA LOS DATOS DE LA SUCURSAL SELECCIONADA
    function verSucursal($param = null)
    {
        
        $codSucursal = $param[0];
        $sucursal = $this->model->getById($codSucursal);

       
        $this->view->sucursal = $sucursal;
        $this->view->mensaje = "";
        $this->view->render('admin/actualizarsucursal');
    }
//ACTUALIZA LA SUCURSAL
    function actualizarSucursal()
    { 
      $codSucursal = $_POST['codSucursal'];
        $estado    = $_POST['estado'];
        $ciudad  = $_POST['ciudad'];
        $direccion  = $_POST['direccion'];
       

        if($this->model->update(['codSucursal' => $codSucursal,'estado' => $estado,'ciudad' => $ciudad,'direccion' => $direccion] )){
            $sucursal = new Sucursal();
            $sucursal->codSucursal = $codSucursal;
            $sucursal->estado = $estado;
            $sucursal->ciudad = $ciudad;
            $sucursal->direccion = $direccion;
            $this->view->sucursal = $sucursal;
           
            $this->view->mensaje = "Datos actualizados correctamente";
     
            $this->view->render('admin/actualizarsucursal');
            
        }
        
        else
        {
            $this->view->mensaje = "No se pudo actualizar ";
           
        }
    }
    //ELIMINA
    function eliminar($param = null)
        {
            $codSucursal = $param[0];
    
            if($this->model->delete($codSucursal)){
               
                $mensaje = "Sucursal eliminada correctamente";
            }else{
                
                $mensaje = "No se pudo eliminar la Sucursal";
            }
           $this->render();
            
            echo $mensaje;
        } 


    
}

?>