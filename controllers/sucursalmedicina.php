<?php
//VISTA QUE ES CONTROLADA POR EL AGENTE
class SucursalMedicina extends SessionController
{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        $this->view->medicinas = [];
    }
//MUESTRA LAS VISTAS
    function render()
    { 
        $this->view->render('agente/consultarmedicinas', [
            'user'                 => $this->user,
            'medicinas' => $this->getListSucursal()
        ]);
    }

//MUESTRA LA LISTA DE MEDICINAS QUE PERTENECEN A LA SUCURSAL DEL AGENTE
    private function getListSucursal(){
        $res = [];
        $sucursalmedicinamodel = new SucursalMedicinaModel();
        $medicinas = $sucursalmedicinamodel->getAll($this->user->getCod());

        foreach ($medicinas as $medicina) {
        
          $sucursalArray = [];
          $sucursalArray['medicina'] = $medicina;
         
          array_push($res, $sucursalArray);

        }
     

        return $res;
    }
 

    //MUESTRA EN OTRA VENTANA LOS DATOS DE LA MEDICINA SELECCIONADA
    function verMedicina($param = null)
    {
        
        $codmedicina = $param[0];
        $codsucu = $this->user->getcodsucursal();
        $medicinas = $this->model->getById($codmedicina,$codsucu);


        $this->view->medicinas = $medicinas;
        $this->view->mensaje = "";
        $this->view->render('agente/registrarcantidad');
    }



//ACTUALIZA LA MEDICINA SOLO ESTA PERMITIDO CAMBIAR LA CANTIDAD
    function actualizarMedicina()
    {
        $codigomedicina = $_POST['codMedicina'];
        $codigosucursal = $_POST['codSucursal'];
        $cantidad = $_POST['cantidad'];
        $cantidad2 = $_POST['cantidad2'];
        $cantidadtotal = $cantidad + $cantidad2;

        if ($this->model->update(['codMedicina' => $codigomedicina, 'codSucursal' => $codigosucursal,'cantidad' => $cantidadtotal])) {
           
            $medicinas = new Medicinas();
            $medicinas->codigomedicina = $codigomedicina;
            $medicinas->codigosucursal = $codigosucursal;
            $medicinas->cantidad = $cantidad;
           
            $this->view->medicinas = $medicinas;

            $this->model->actualizarinventario(['codMedicina' => $codigomedicina,'cantidad' => $cantidad2]);
           
            $this->view->mensaje = "Cantidad actualizada correctamente";

            $this->view->render('agente/registrarcantidad');
        } else {
            $this->view->mensaje = "No se pudo actualizar ";

        }

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