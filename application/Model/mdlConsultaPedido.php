<?php 

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Model\mdlPedido;

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
   

    public function listar_maestro(){
        $sql = "CALL SP_ListarPedidos () ";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function listar($id_cliente, $fechaInicio, $fechaFin){
        $sql = "SELECT p.*, c.id_cliente, c.nombres_cliente, apellidos_cliente 
        from pedido p 
        INNER JOIN cliente c on (p.id_cliente_pedido = c.id_cliente) 
        where c.id_cliente like ? AND fecha_de_creacion BETWEEN ? AND ?";
 
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $id_cliente); 
        $stm->bindParam(2, $fechaInicio); 
        $stm->bindParam(3, $fechaFin); 
        $stm->execute();
        return $stm->fetchAll();        
 }
 public function ConsultarPorId(){
    $sql = "SELECT p.id_pedido as idp,p.id_cliente_pedido,p.fecha_de_creacion,p.estado_pedido as estadop, p.tipo_venta, dpp.*,p.* from pedido p 
    INNER JOIN detalle_pedido_producto dpp on (p.id_pedido = dpp.id_pedido) 
    INNER JOIN producto pr on (dpp.id_producto = pr.id_producto) 
    WHERE p.id_pedido = ? ";
    $stm = $this->db->prepare($sql); 
    $stm->bindParam(1, $this->id_pedido); 
    $stm->execute(); 
    return $stm->fetchAll(); 
 }

    public function cambiar_estado(){
        $sql = "UPDATE pedido SET estado_pedido = ? WHERE id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->estado_pedido);
        $stm->bindParam(2, $this->id_pedido);
        return $stm->execute();
    }


}