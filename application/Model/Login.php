<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Login extends Model {

    private $usuario;
    private $clave;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function consulta_usuario(){
        $stm = $this->db->prepare("CALL Buscar_usuario(?,?)");
        $stm->bindParam(1, $this->usuario);
        $stm->bindParam(2, $this->clave);
        $stm->execute();
        return $stm->fetch();
    }
}