<?php

class ConsultaLaboratorio extends SessionController
{

    private $user;


    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();

        $this->view->laboratorio = [];
    }

    //METODO QUE PERMITE MOSTRAR LAS VISTAS
    function render()
    {

        $laboratorios = $this->model->getAll_lista();

        $this->view->laboratorio = $laboratorios;
        $this->view->render('admin/consultalaboratorio', [
            'user' => $this->user,
            'medicinas' => $this->getListMedicinas(),
            'laboratorios' => $this->getListLaboratorios(),

        ]);
    }
    //MUESTRA EN UN COMBOBOX LOS CODIGOS DE LAS MEDICINAS DISPONIBLES
    private function getListMedicinas()
    {
        $res = [];
        $listamedicinasucursal = new ConsultaLaboratorioModel();
        $medicinas = $listamedicinasucursal->getAllMedicina();

        foreach ($medicinas as $medicina) {
            array_push($res, $medicina->getcodMedicina());
        }
        $res = array_values(array_unique($res));

        return $res;
    }
    //MUESTRA EN UN COMBOBOX LOS CODIGOS DE LOS LABORATORIOS DISPONIBLES
    private function getListLaboratorios()
    {
        $res = [];
        $listalaboratoriomodel = new ConsultaLaboratorioModel();
        $laboratorios = $listalaboratoriomodel->getAllLaboratorio();


        foreach ($laboratorios as $laboratorio) {
            array_push($res, $laboratorio->getcodlab());
        }
        $res = array_values(array_unique($res));

        return $res;

    }


    //MUESTRA  LA VISTA REGISTRAR MEDICINAS POR LABORATORIO
    function pantallaregistroporlaboratorio()
    {
        $this->view->mensaje = "";
        $this->view->render('admin/registrarmedicinalaboratorio', [
            'user' => $this->user,
            'medicinas' => $this->getListMedicinas(),
            'laboratorios' => $this->getListLaboratorios(),

        ]);
    }

    // METODO QUE REGISTRA LAS MEDICINAS POR LABORATORIO
    function registrarmedicinaslaboratorio()
    {

        $codMedicina = $_POST['codMedicina'];
        $codlab = $_POST['codlab'];

        if ($this->model->registrarmedicinaslaboratorio(['codMedicina' => $codMedicina, 'codlab' => $codlab])) {

            $this->view->mensaje = "Registro Exitoso!";

            $this->view->render('admin/registrarmedicinalaboratorio', [

                'medicinas' => $this->getListMedicinas(),
                'laboratorios' => $this->getListLaboratorios()

            ]);
        } else {
            $this->view->mensaje = "La Medicina ya está registrada";
            $this->view->render('admin/registrarmedicinalaboratorio', [

                'medicinas' => $this->getListMedicinas(),
                'laboratorios' => $this->getListLaboratorios(),

            ]);
        }
    }



    //MUESTRA EN OTRA VENTANA LA VISTA PARA REGISTRAR LABORATORIOS
    function pantallaregistro()
    {
        $this->view->mensaje = "";
        $this->view->render('admin/registrarlaboratorio');
    }
    //METODO QUE REGISTRA LABORATORIOS
    function registrar()
    {
        $codlaboratorio = $_POST['codLaboratorio'];
        $nombre = $_POST['nombre'];

        if ($this->model->insert(['codlab' => $codlaboratorio, 'nombrelab' => $nombre])) {
            $this->view->mensaje = "Laboratorio Registrado correctamente";
            $this->view->render('admin/registrarlaboratorio');
        } else {
            $this->view->mensaje = "el Laboratorio ya está registrado";
            $this->view->render('admin/registrarlaboratorio');
        }
    }

    //MUESTRA EN OTRA VENTANA LOS DATOS DE LA MEDICINA SELECCIONADA
    function verMedicina($param = null)
    {

        $codMedicina = $param[0];
        $laboratorios = $this->model->getById($codMedicina);


        $this->view->laboratorio = $laboratorios;
        $this->view->mensaje = "";
        $this->view->render('admin/actualizarlaboratorio', [


            'laboratorios' => $this->getListLaboratorios()

        ]);
    }
    //METODO QUE ACTUALIZA
    function actualizarMedicina()
    {
        $codMedicina = $_POST['codMedicina'];
        $codlab = $_POST['codlab2'];


        if ($this->model->update(['codMedicina' => $codMedicina, 'codlab' => $codlab])) {

            $medicina = new Laboratorio();
            $medicina->codMedicina = $codMedicina;
            $medicina->codlab = $codlab;

            $this->view->medicina = $medicina;

           // $this->view->mensaje = "Actualizacion realizada correctamente";
           $mensaje = "Actualizacion realizada correctamente";

          
        } else {
            $mensaje = "No se pudo Actualizadar correctamente";
         

        }
        $this->render();
        echo $mensaje;

    }
    function eliminar($param = null)
    {
        $codMedicina = $param[0];

        if ($this->model->delete($codMedicina)) {
          

            $mensaje = "Medicina eliminada correctamente";
        } else {

            $mensaje = "No se pudo eliminar la Medicina";
        }
        $this->render();

        echo $mensaje;
    }



}

?>