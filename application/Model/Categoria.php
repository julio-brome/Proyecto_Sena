<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Categoria extends Model {

    private $id;
    private $nombre_c;
    private $estado;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }
    
    public function guardar_categoria(){
        $stm = $this->db->prepare("CALL Guardar_categoria(?)");
        $stm->bindParam(1, $this->nombre_c);
        return $stm->execute();
    }
    
    public function Listar_categoria(){
        $stm = $this->db->prepare("CALL Listar_categorias(?)");
        $stm->bindParam(1, $this->nombre_c);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function Buscar_categoria(){
        $stm = $this->db->prepare("CALL Buscar_categoria(?)");
        $stm->bindParam(1, $this->nombre_c);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL cambiar_estado_categoria(?,?)");
        $stm->bindParam(1, $this->id);
        $stm->bindParam(2, $this->estado);
        return $stm->execute();
    }
    
    public function consultar_categoria(){
        $stm = $this->db->prepare("CALL Consultar_categoria(?)");
        $stm->bindParam(1, $this->id);
        $stm->execute();
        return $stm->fetch();
    }
    
    public function modificar_categoria(){
        $stm = $this->db->prepare("CALL Modificar_categoria(?,?)");
        $stm->bindParam(1, $this->id);
        $stm->bindParam(2, $this->nombre_c);
        return $stm->execute();
    }

    public function mostrar_categorias(){
        $stm = $this->db->prepare("CALL Mostrar_categorias()");
        $stm->execute();
        return $stm->fetchAll();
    }
}
