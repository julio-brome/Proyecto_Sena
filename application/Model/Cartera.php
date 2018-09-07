<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Cartera extends Model {

    private $cedula;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function consulta_cliente(){
        $stm = $this->db->prepare("CALL Consultar_cliente_cartera(?)");
        $stm->bindParam(1, $this->cedula);
        $stm->execute();
        return $stm->fetch();
    }
    
    public function consulta_pedido(){
        $stm = $this->db->prepare("CALL Consultar_pedido_cartera(?)");
        $stm->bindParam(1, $this->cedula);
        $stm->execute();
        return $stm->fetch();
    }
    
    
}