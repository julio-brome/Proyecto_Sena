<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Proveedor extends Model {

    private $id;
    private $nombre_empresa;
    private $nombre_contacto;
    private $tipo_doc;
    private $numero_doc;
    private $direc;
    private $tel;
    private $cel;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar(){
        $stm = $this->db->prepare("CALL Listar_proveedores(?)");
        $stm->bindParam(1,$this->nombre_empresa);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function guardar(){
        $stm = $this->db->prepare("CALL Guardar_proveedor(?,?,?,?,?,?,?)");
        $stm->bindParam(1,$this->nombre_empresa);
        $stm->bindParam(2,$this->nombre_contacto);
        $stm->bindParam(3,$this->tipo_doc);
        $stm->bindParam(4,$this->numero_doc);
        $stm->bindParam(5,$this->direc);
        $stm->bindParam(6,$this->tel);
        $stm->bindParam(7,$this->cel);
        return $stm->execute();
    }

    public function consultar_proveedor(){
        $stm = $this->db->prepare("CALL Consultar_proveedor(?)");
        $stm->bindParam(1,$this->id);
        $stm->execute();
        return $stm->fetch();
    }

    public function buscar_proveedor(){
        $stm = $this->db->prepare("CALL Buscar_proveedor(?)");
        $stm->bindParam(1,$this->numero_doc);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function modificar(){
        $stm = $this->db->prepare("CALL Modificar_proveedor(?,?,?,?,?,?,?,?)");
        $stm->bindParam(1,$this->id);
        $stm->bindParam(2,$this->nombre_empresa);
        $stm->bindParam(3,$this->nombre_contacto);
        $stm->bindParam(4,$this->tipo_doc);
        $stm->bindParam(5,$this->numero_doc);
        $stm->bindParam(6,$this->direc);
        $stm->bindParam(7,$this->tel);
        $stm->bindParam(8,$this->cel);
        return $stm->execute();
    }

    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL Cambiar_estado_proveedor(?,?)");
        $stm->bindParam(1,$this->id);
        $stm->bindParam(2,$this->estado);
        return $stm->execute();
    }

    public function mostrar_proveedores(){
        $stm = $this->db->prepare("CALL Mostrar_proveedores()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function listar_proveedorProducto (){
        $sql = "CALL SP_listarProveedorProducto(?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id);
        $stm->execute();
        return $stm->fetchAll();
        }

}
