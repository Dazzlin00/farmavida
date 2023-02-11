
<?php
//LISTA DE MEDICINAS POR SUCURSAL
class ListaMedicina extends SessionController{


    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
      
    }
//MUESTRA LAS VISTAS
     function render(){
       

        $this->view->render('admin/listamedicinas', [
            'user' => $this->user,
           'sucursals' => $this->getListSucursal(),
           
        ]);
    }

//MUESTRA EN UN COMBOBOX LOS CODIGOS DE LAS SUCURSALES EXISTENTES
    private function getListSucursal(){
        $res = [];
        $listamedicinasucursal = new ListaMedicinaModel();
        $sucursals = $listamedicinasucursal->getAllSucursal();

        foreach ($sucursals as $sucursal) {
            array_push($res, $sucursal->getcodigosucursal());
        }
        $res = array_values(array_unique($res));

        return $res;
    }
    //MUESTRA LA LISTA DE MEDICINAS
    private function getListMedicinas(){
        $res = [];
        $listamedicinamodel = new ListaMedicinaModel();
        $medicinas = $listamedicinamodel->getAll_lista();

        foreach ($medicinas as $medicina) {
         
          $sucursalArray = [];
          $sucursalArray['medicina'] = $medicina;
         
          array_push($res, $sucursalArray);

        }
     

        return $res;
    }
   
    
    // devuelve el JSON para las llamadas AJAX
    function getHistoryJSON(){
        header('Content-Type: application/json');
        $res = [];
        $listamedicinamodel = new ListaMedicinaModel();
        $medicinas = $listamedicinamodel->getAll_lista();

        foreach ($medicinas as $medicina) 
        {
            
            array_push($res, $medicina->toArray());
            
        }
        
        echo json_encode($res);

    }
    
//ELIMINA
    function eliminar($param = null)
    {
        $codMedicina = $param[0];
          
        if($this->model->delete($codMedicina)){
            
            $mensaje = "Medicina eliminada correctamente";
        }else{
            
            $mensaje = "No se pudo eliminar la Medicina";
        }
       $this->render();
        
        echo $mensaje;
    }
    

}

?>