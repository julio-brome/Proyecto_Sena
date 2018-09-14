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
    private $correo_electronico;
    private $codigo;
    private $p_fecha_recuperacion;


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

    /**
     * Obtener una persona con correo Electronico
     * @param string $p_correoElectronico
     */
    public function getUserWithEmail(){
        $stm = $this->db->prepare("CALL Get_usuario_mail(?)");
        $stm->bindParam(1,$this->correo_electronico);
        return $stm->execute();

        try {

            $query = $this->db->prepare($sql);
            $query->execute($parameters);
            return ($query->rowcount() ? $query->fetch() : false);

        } catch (PDOException $e) {

            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;

        } catch (Exception $e) {
            
            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;
        }
    }


    /**
     * Cambiar la contraseña y actualizar el campo para verificar al entrar
     * @param string $p_correoElectronico Correo Electrónico
     * @param string $p_codigo Código que se enviara al correo electronico y luego se validara
     * @param string $p_fechaRecuperacion Fecha para validar que el código este valido (24 horas)
     */
    public function recoverPassword(){
        $stm = $this->db->prepare("CALL Recuperar_clave(?,?,?)");
        $stm->bindParam(1,$this->correo_electronico);
        $stm->bindParam(2,$this->codigo);
        $stm->bindParam(3,$this->fecha_recuperacion);

        try {

            $query = $this->db->prepare($sql);
            return $query->execute($parameters);

        } catch (PDOException $e) {

            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;

        } catch (Exception $e) {
            
            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;
        }
    }
}
