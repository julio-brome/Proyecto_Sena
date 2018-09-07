<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Clientes extends Model {

    private $ejemplo;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar(){
        $sql = "SELECT * FROM cliente";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}
