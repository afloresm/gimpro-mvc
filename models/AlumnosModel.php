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


}
?>