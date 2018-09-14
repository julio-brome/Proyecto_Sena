<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Clientes extends Model {

    private $id;
    private $nombres;
    private $apellidos;
    private $tipo_doc;
    private $numero_doc;
    private $direc;
    private $cel;
    private $estado;
    private $id_ruta;
    private $cartera;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar(){
        $stm = $this->db->prepare("CALL Listar_clientes(?,?)");
        $stm->bindParam(1,$this->nombres);
        $stm->bindParam(2,$this->id_ruta);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function guardar(){
        $stm = $this->db->prepare("CALL Guardar_cliente(?,?,?,?,?,?,?,?)");
        $stm->bindParam(1,$this->nombres);
        $stm->bindParam(2,$this->apellidos);
        $stm->bindParam(3,$this->tipo_doc);
        $stm->bindParam(4,$this->numero_doc);
        $stm->bindParam(5,$this->cartera);
        $stm->bindParam(6,$this->direc);
        $stm->bindParam(7,$this->cel);
        $stm->bindParam(8,$this->id_ruta);
        return $stm->execute();
    }

    public function consultar_cliente(){
        $stm = $this->db->prepare("CALL Consultar_cliente(?)");
        $stm->bindParam(1,$this->id);
        $stm->execute();
        return $stm->fetch();
    }

    public function buscar_cliente(){
        $stm = $this->db->prepare("CALL Buscar_cliente(?)");
        $stm->bindParam(1,$this->numero_doc);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function modificar(){
        $stm = $this->db->prepare("CALL Modificar_cliente(?,?,?,?,?,?,?,?,?)");
        $stm->bindParam(1,$this->id);
        $stm->bindParam(2,$this->nombres);
        $stm->bindParam(3,$this->apellidos);
        $stm->bindParam(4,$this->tipo_doc);
        $stm->bindParam(5,$this->numero_doc);
        $stm->bindParam(6,$this->cartera);
        $stm->bindParam(7,$this->direc);
        $stm->bindParam(8,$this->cel);
        $stm->bindParam(9,$this->id_ruta);
        return $stm->execute();
    }

    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL Cambiar_estado_cliente(?,?)");
        $stm->bindParam(1,$this->id);
        $stm->bindParam(2,$this->estado);
        return $stm->execute();
    }

    public function mostrar_clientes(){
        $stm = $this->db->prepare("CALL Mostrar_clientes()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function listar_cliente_pedido(){
        $sql = "CALL SP_ListarCliente () ";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

}
