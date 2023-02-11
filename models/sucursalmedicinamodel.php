<?php
include_once 'models/medicinas.php';

//CLASE MODELO DE SUCURSALMEDICINA
class SucursalMedicinaModel extends Model
{
    private $codigomedicina;
    private $codigosucursal;

    private $nombres;
    private $cantidad;



    public function __construct()
    {
        parent::__construct();

        $this->codigomedicina = '';
        $this->codigosucursal = '';
        $this->cantidad = '';
    }
    //MUESTRA LISTAS
    public function getAll($userid)
    {
        $items = [];
        try {
            $query = $this->prepare('SELECT sucursal_medicina.codSucursal,sucursal_medicina.codMedicina,nombre,sucursal_medicina.cantidad FROM sucursal_medicina INNER JOIN usuario ON codSucursal = usuario.codsucu INNER JOIN medicina ON medicina.codMedicina = sucursal_medicina.codMedicina AND usuario.codusuario =:userid ORDER BY codMedicina');
            $query->execute(["userid" => $userid]);


            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new SucursalMedicinaModel();
                $item->from($p);
                array_push($items, $item);
            }

            return $items;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    //ACTUALIZA
    public function actualizarinventario($item)
    {
        $query = $this->db->connect()->prepare('UPDATE medicina SET cantidad = cantidad+:cantidad  WHERE codMedicina = :codMedicina');
        try {
            $query->execute([
                'codMedicina' => $item['codMedicina'],
                'cantidad' => $item['cantidad'],


            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }

    }
    //ACTUALIZA
    public function actualizarinventario2($item)
    {

        $query = $this->db->connect()->prepare('UPDATE sucursal_medicina SET cantidad = :cantidad WHERE  codSucursal = :codSucursal and codMedicina = :codMedicina');
        try {
            $query->execute([
                'codMedicina' => $item['codMedicina'],
                'codSucursal' => $item['codSucursal'],
                'cantidad' => $item['cantidad']


            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
    //ACTUALIZA
    public function actualizarinventario3($item)
    {

        $query = $this->db->connect()->prepare('UPDATE sucursal_medicina SET cantidad = SUM(cantidad) + :cantidad  WHERE  codSucursal = :codSucursal and codMedicina = :codMedicina');
        try {
            $query->execute([
                'codMedicina' => $item['codMedicina'],
                'codSucursal' => $item['codSucursal'],
                'cantidad' => $item['cantidad']


            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }


    }
    //BUSCA
    public function getcod($codigosucursal)
    {
        try {
            $query = $this->prepare('SELECT * FROM sucursal_medicina WHERE codSucursal = :codigosucursal');
            $query->execute(['codigosucursal' => $codigosucursal]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->from($user);

            return $this;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function from($array)
    {
        $this->codigomedicina = $array['codMedicina'];
        $this->codigosucursal = $array['codSucursal'];
        $this->nombres = $array['nombre'];
        $this->cantidad = $array['cantidad'];

    }
//BUSCA
    public function get()
    {
        $items = [];

        try {

            $query = $this->db->connect()->query('SELECT * FROM sucursal_medicina');

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new Medicinas();
                $item->codigomedicina = $row['codMedicina'];
                $item->codigosucursal = $row['codSucursal'];
                $item->cantidad = $row['cantidad'];
                array_push($items, $item);
            }
            return $items;


        } catch (PDOException $e) {
            echo $e;
        }


    }
    //BUSCA
    public function getById2($codMedicina, $codigosucursal)
    {
        $item = new SucursalMedicinaModel();

        $query = $this->db->connect()->prepare('SELECT sucursal_medicina.codMedicina,nombre,sucursal_medicina.cantidad  FROM sucursal_medicina INNER JOIN medicina  WHERE medicina.codMedicina = sucursal_medicina.codMedicina AND medicina.codMedicina = :codMedicina AND sucursal_medicina.codSucursal = :codSucursal ORDER BY medicina.codMedicina');

        try {
            $query->execute(['codMedicina' => $codMedicina, 'codSucursal' => $codigosucursal]);

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $item->codigomedicina = $row['codMedicina'];
                $item->codigosucursal = $row['codSucursal'];
                $item->nombres = $row['nombre'];
                $item->cantidad = $row['cantidad'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;

        }

    }
//BUSCA
    public function getById($codMedicina, $codigosucursal)
    {
        $item = new Medicinas();

        $query = $this->db->connect()->prepare('SELECT * FROM sucursal_medicina WHERE codSucursal=:codSucursal AND codMedicina = :codMedicina');

        try {
            $query->execute(['codMedicina' => $codMedicina, 'codSucursal' => $codigosucursal]);

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $item->codigomedicina = $row['codMedicina'];
                $item->codigosucursal = $row['codSucursal'];
                $item->cantidad = $row['cantidad'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;

        }

    }

//ACTUALIZA
    public function update($item)
    {

        $query = $this->db->connect()->prepare('UPDATE sucursal_medicina  SET cantidad = :cantidad WHERE codSucursal = :codSucursal and codMedicina = :codMedicina');
        try {
            $query->execute([
                'codMedicina' => $item['codMedicina'],
                'codSucursal' => $item['codSucursal'],
                'cantidad' => $item['cantidad']

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
//ELIMINA

    public function delete($cod)
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
    public function setcodmedicina($codigomedicina)
    {
        $this->codigomedicina = $codigomedicina;
    }
    public function getcodmedicina()
    {
        return $this->codigomedicina;
    }
    public function setnombre($nombres)
    {
        $this->nombres = $nombres;
    }
    public function getnombre()
    {
        return $this->nombres;
    }
    public function setcodigosucursal($codigosucursal)
    {
        $this->codigosucursal = $codigosucursal;
    }
    public function getcodigosucursal()
    {
        return $this->codigosucursal;
    }
    public function setcantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function getcantidad()
    {
        return $this->cantidad;
    }

}
?>