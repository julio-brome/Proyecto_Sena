<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Movimientos extends Model {

    private $tipo;
    private $producto;
    private $descripcion;
    private $cantidad;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar_movimientos(){
        $stm = $this->db->prepare("CALL listar_movimientos(?,?)");
        $stm->bindParam(1,$this->tipo);
        $stm->bindParam(2,$this->producto);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function aumentar(){
        $stm = $this->db->prepare("CALL Aumentar_movimiento(?,?,?,?)");
        $stm->bindParam(1,$this->producto);
        $stm->bindParam(2,$this->tipo);
        $stm->bindParam(3,$this->descripcion);
        $stm->bindParam(4,$this->cantidad);
        return $stm->execute();
    }
    
    public function disminuir(){
        $stm = $this->db->prepare("CALL Descontar_movimiento(?,?,?,?)");
        $stm->bindParam(1,$this->producto);
        $stm->bindParam(2,$this->tipo);
        $stm->bindParam(3,$this->descripcion);
        $stm->bindParam(4,$this->cantidad);
        return $stm->execute();
    }
}
