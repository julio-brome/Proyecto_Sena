<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Producto extends Model {

    private $id;
    private $nombre;
    private $proveedor;
    private $id_categoria;
    private $precio_venta;
    private $existencia;
    private $stock;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function guardar(){
        $stm = $this->db->prepare("CALL Guardar_producto(?,?,?,?,?)");
        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->precio_venta);
        $stm->bindParam(3, $this->existencia);
        $stm->bindParam(4, $this->stock);
        $stm->bindParam(5, $this->id_categoria);
        return $stm->execute();
    }
    
    public function modificar(){
        $stm = $this->db->prepare("CALL Modificar_producto(?,?,?,?,?,?)");
        $stm->bindParam(1, $this->id);
        $stm->bindParam(2, $this->nombre);
        $stm->bindParam(3, $this->precio_venta);
        $stm->bindParam(4, $this->existencia);
        $stm->bindParam(5, $this->stock);  
        $stm->bindParam(6, $this->id_categoria);
        return $stm->execute();
    }
    
    public function buscar_producto(){
        $stm = $this->db->prepare("CALL Buscar_producto(?)");
        $stm->bindParam(1, $this->nombre);
        $stm->execute();
        return $stm->fetch();
    }
    
    public function listar_productos(){
        $stm = $this->db->prepare("CALL Listar_productos(?,?)");
        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->proveedor);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    
    public function consultar(){
        $stm = $this->db->prepare("CALL Consultar_producto(?)");
        $stm->bindParam(1, $this->id);
        $stm->execute();
        return $stm->fetch();
    }
    
    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL cambiar_estado_producto(?,?)");
        $stm->bindParam(1, $this->id);
        $stm->bindParam(2, $this->estado);
        return $stm->execute();
    }
    
    public function traer_id(){
        $stm = $this->db->prepare("CALL Buscar_idproducto()");
        $stm->execute();
        return $stm->fetch();
    }
    
    public function mostrar_productos(){
        $stm = $this->db->prepare("CALL Mostrar_productos()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function listar_agotados(){
        $stm = $this->db->prepare("CALL Productos_agotados()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function listar(){
        $sql = "CALL SP_ListarProducto () ";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

}
