<?php 

namespace Mini\Model;

use Mini\Core\Model;

class mdlPedido extends Model {

    private $id_pedido;
    private $id_producto;
    private $cantidad;    
    private $subtotal;
    private $id_cliente_pedido;
    private $estado_de_pedido;
    private $forma_de_pago;
    private $valor_total;
    private $observaciones;
    

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

       

    

    public function insertarPedido(){
        $sql = "CALL SP_InsertarPedido(?, ?, ?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_cliente_pedido);
        $stm->bindParam(2, $this->estado_de_pedido);
        $stm->bindParam(3, $this->tipo_venta);
        $stm->bindParam(4, $this->valor_total);
        $stm->bindParam(5, $this->observaciones);      
        return $stm->execute();
    }

    public function insertarDetallePedido(){
        $sql = "CALL SP_InsertarDetallePedido(?, ?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_pedido);
        $stm->bindParam(2, $this->id_producto);
        $stm->bindParam(3, $this->cantidad);
        $stm->bindParam(4, $this->subtotal);
        return $stm->execute();
    }

    public function ultimaVenta(){
        $sql = "CALL SP_UltimoPedido()";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

}