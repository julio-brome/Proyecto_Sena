<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Usuario extends Model {

    private $id;
    private $nombres_usuario;
    private $apellidos_usuario;
    private $tipo_doc;
    private $numero_doc;
    private $rol_usuario;
    private $usuario;
    private $clave;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar(){
        $stm = $this->db->prepare("CALL Listar_usuarios(?)");
        $stm->bindParam(1,$this->nombres_usuario);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function guardar(){
        $stm = $this->db->prepare("CALL Guardar_usuario(?,?,?,?,?,?,?)");
        $stm->bindParam(1,$this->nombres_usuario);
        $stm->bindParam(2,$this->apellidos_usuario);
        $stm->bindParam(3,$this->tipo_doc);
        $stm->bindParam(4,$this->numero_doc);
        $stm->bindParam(5,$this->rol_usuario);
        $stm->bindParam(6,$this->usuario);
        $stm->bindParam(7,$this->clave);
        return $stm->execute();
    }

    public function consultar_usuario(){
        $stm = $this->db->prepare("CALL Consultar_usuario(?)");
        $stm->bindParam(1,$this->id);
        $stm->execute();
        return $stm->fetch();
    }

    public function buscar_usuario(){
        $stm = $this->db->prepare("CALL Buscar_usuario_doc(?)");
        $stm->bindParam(1,$this->numero_doc);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function modificar(){
        $stm = $this->db->prepare("CALL Modificar_usuario(?,?,?,?,?,?,?,?)");
        $stm->bindParam(1,$this->id);
        $stm->bindParam(2,$this->nombres_usuario);
        $stm->bindParam(3,$this->apellidos_usuario);
        $stm->bindParam(4,$this->tipo_doc);
        $stm->bindParam(5,$this->numero_doc);
        $stm->bindParam(6,$this->rol_usuario);
        $stm->bindParam(7,$this->usuario);
        $stm->bindParam(8,$this->clave);
        return $stm->execute();
    }

    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL Cambiar_estado_usuario(?,?)");
        $stm->bindParam(1,$this->id);
        $stm->bindParam(2,$this->estado);
        return $stm->execute();
    }
}
