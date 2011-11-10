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

    public  function save_ranking($id,$ranking){
        $consulta = $this->db->prepare("UPDATE usuario SET nota_encuesta=:ranking WHERE id_user=:id");
        $consulta->bindParam(':ranking', $ranking);
        $consulta->bindParam(':id', $id);
        $r=$consulta->execute();

        if($r) return true;
        else return false;

    }

    public function get_respuesta($id,$i){
        
        $consulta = $this->db->prepare("SELECT respuesta FROM encuesta WHERE id_user=:id and id_pregunta=:i");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':i', $i);
        $r=$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) {
            $resp=$row['respuesta'];
            return $resp; }
        else return false;

    }


}
