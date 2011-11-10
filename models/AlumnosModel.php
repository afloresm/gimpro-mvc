<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 24-10-11
 * Time: 04:57 PM
 * To change this template use File | Settings | File Templates.
 */

class AlumnosModel extends ModelBase
{

       //Muestra los ultimos 5 usuarios registrados
    public function lastRegister()
    {

        $query = $this->db->prepare("SELECT * FROM (SELECT * FROM usuario ORDER BY fecha_inicio DESC limit 5) AS fecha ORDER BY fecha_inicio asc");

        $query->execute();

        return $query;
    }

    function buscarUserbyName($name1='0',$name2='0',$name3='0',$name4='0'){

            if($name1==null)
                $name1="%0%";
            if($name2==null)
                $name2="%0%";
            if($name3==null)
                $name3="%0%";
            if($name4==null)
                $name4="%0%";

        $query = $this->db->prepare("SELECT DISTINCT * FROM usuario where nombres like :name1 or apellidos like :name1 or nombres like :name2 or apellidos like :name2 or
            nombres like :name3 or apellidos like :name3;");
        $query->bindParam(':name1', "%".$name1."%");
        $query->bindParam(':name2', "%".$name2."%");
        $query->bindParam(':name3', "%".$name3."%");
        $query->bindParam(':name4', "%".$name4."%");


        $query->execute();

        return $query;
    }


}
?>