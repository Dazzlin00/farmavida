<?php
include_once 'models/Laboratorio.php';
include_once 'listamedicinamodel.php';

//CLASE MODELO DE CONSULTALABORATORIO
class ConsultaLaboratorioModel extends Model
{
    private $codMedicina;
    private $codlab;
    private $nombre;

    public function __construct()
    {
        parent::__construct();
    }
//MUESTRA LISTAS 
    public function getAll_lista(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT laboratorio_medicina.codMedicina,medicina.nombre,laboratorio.codlab, laboratorio.nombrelab FROM laboratorio INNER JOIN laboratorio_medicina ON laboratorio.codlab= laboratorio_medicina.codlab INNER JOIN medicina ON medicina.codMedicina = laboratorio_medicina.codMedicina  ORDER BY laboratorio_medicina.codMedicina');
           


            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new Laboratorio();
                $item->codMedicina = $row['codMedicina'];
                $item->codlab = $row['codlab'];
                $item->nombremed = $row['nombre'];
                $item->nombre = $row['nombrelab'];
                array_push($items, $item);
            }

            return $items;

        }catch(PDOException $e){
            echo $e;
        }
    }


     //MUESTRA TODOS LAS MEDICINAS

    public function getAllMedicina(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM medicina');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ConsultaLaboratorioModel();
                $item->from($p); 
                
                array_push($items, $item);
            }

            return $items;

        }catch(PDOException $e){
            echo $e;
        }
    }
    //MUESTRA TODOS LOS LABORATORIOS
    public function getAllLaboratorio(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM laboratorio');

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ConsultaLaboratorioModel();
                $item->codlab = $row['codlab'];
                
                array_push($items, $item);
            }

            return $items;

        }catch(PDOException $e){
            echo $e;
        }
    }
    
    public function from($array){
      
        $this->codMedicina = $array['codMedicina'];
       
       
    }
    //INSERTA
    public function insert($datos){
        // insertar
        $query = $this->db->connect()->prepare('INSERT INTO laboratorio (codlab, nombrelab) VALUES(:codlab, :nombrelab)');
        try{
            $query->execute([
                'codlab' => $datos['codlab'],
                'nombrelab' => $datos['nombrelab'],
              
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
    }
    //REGISTRA LAS MEDICINAS POR LABORATORIO
    public function registrarmedicinaslaboratorio($datos){
        // insertar
        $query = $this->db->connect()->prepare('INSERT INTO laboratorio_medicina (codMedicina, codlab) VALUES(:codMedicina, :codlab)');
        try{
            $query->execute([
                'codMedicina' => $datos['codMedicina'],
                'codlab' => $datos['codlab']
               
                
               
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
    }
   
    //BUSCA 
    public function getById($codMedicina)
    {
        $item = new Laboratorio();
        $query = $this->db->connect()->prepare('SELECT laboratorio_medicina.codMedicina,medicina.nombre,laboratorio.codlab, laboratorio.nombrelab FROM laboratorio INNER JOIN laboratorio_medicina ON laboratorio.codlab= laboratorio_medicina.codlab INNER JOIN medicina ON medicina.codMedicina = laboratorio_medicina.codMedicina and laboratorio_medicina.codMedicina=:codMedicina ORDER by laboratorio_medicina.codMedicina');

        try {
            $query->execute(['codMedicina' => $codMedicina]);
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $item->codMedicina = $row['codMedicina'];
                $item->codlab = $row['codlab'];
                $item->nombremed = $row['nombre'];
                $item->nombre = $row['nombrelab'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;

        }

    }

    //ACTUALIZA 
    public function update($item){
       
            $query = $this->db->connect()->prepare('UPDATE laboratorio_medicina SET codlab = :codlab  WHERE codMedicina = :codMedicina');
            try{  $query->execute([
                'codMedicina' => $item['codMedicina'],
                'codlab' => $item['codlab'],
              
             
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    //ELIMINA EL LABORATORIO
    public function delete($cod)
    {

        $query = $this->db->connect()->prepare('DELETE FROM laboratorio_medicina   WHERE codMedicina = :cod');
        try {
            $query->execute([
                'cod' => $cod,
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
    //ELIMINA LA SUCURSAL
    public function deletesucursal($cod)
    {

        $query = $this->db->connect()->prepare('DELETE FROM sucursal_medicina   WHERE codMedicina = :cod');
        try {
            $query->execute([
                'cod' => $cod,


            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    //SETTERS AND GETTERS
    public function setcodMedicina($codMedicina)
    {
        $this->codMedicina = $codMedicina;
    }
    public function getcodMedicina()
    {
        return $this->codMedicina;
    }
    public function setcodlab($codlab)
    {
        $this->codlab = $codlab;
    }
    public function getcodlab()
    {
        return $this->codlab;
    }


}
?>