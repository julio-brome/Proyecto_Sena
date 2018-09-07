<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Detalle extends Model {

    private $id;
    private $producto;
    private $proveedor;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }
    
    public function guardar_detalle(){
        $stm = $this->db->prepare("CALL Guardar_detalle_producto(?,?)");
        $stm->bindParam(1, $this->producto);
        $stm->bindParam(2, $this->proveedor);
        return $stm->execute();
    }
    
    public function buscar_detalle(){
        $stm = $this->db->prepare("CALL Buscar_detalle_producto(?,?)");
        $stm->bindParam(1, $this->producto);
        $stm->bindParam(2, $this->proveedor);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function listar_detalle(){
        $stm = $this->db->prepare("CALL Consultar_detalle_producto(?)");
        $stm->bindParam(1, $this->id);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function mostrar_detalles(){
        $stm = $this->db->prepare("CALL Listar_detalles_producto(?,?)");
        $stm->bindParam(1, $this->producto);
        $stm->bindParam(2, $this->proveedor);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL cambiar_estado_detalle(?,?)");
        $stm->bindParam(1, $this->id);
        $stm->bindParam(2, $this->estado);
        return $stm->execute();
    }
}