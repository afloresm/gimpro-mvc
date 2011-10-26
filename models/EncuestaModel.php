<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 26-10-11
 * Time: 03:18 PM
 * To change this template use File | Settings | File Templates.
 */
 
class EncuestaModel extends ModelBase{

    public function save($id,$i,$resp){

        $consulta = $this->db->prepare("INSERT INTO encuesta (id_user, id_pregunta, respuesta) VALUES (:id,:i,:resp)");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':i', $i);
        $consulta->bindParam(':resp', $resp);
        $r=$consulta->execute();

        if($r) return true;
        else return false;
    }


}
