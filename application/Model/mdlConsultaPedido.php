<?php 

namespace Mini\Model;

use Mini\Core\Model;

class mdlConsultaPedido extends Model {

    private $id_pedido;
    private $id_cliente;
    private $fecha_de_creacion;    
    private $estado_de_pedido;
    private $tipo_venta;
    private $valor_total;
    private $observaciones;
    

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }
   

    public function listar(){
        $sql = "CALL SP_ListarPedidos () ";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }


}