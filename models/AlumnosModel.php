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

    public function lastRegister()
    {

        $query = $this->db->prepare("SELECT * FROM (SELECT * FROM usuario ORDER BY fecha_inicio DESC limit 5) AS fecha ORDER BY fecha_inicio asc");

        $query->execute();

        return $query;
    }
    public function Validar($user, $pass)
    {
        $q = $this->db->prepare("SELECT password from usuario where username=:usuario");
        $q->bindParam(':usuario', $user);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if ($row["password"] == "" || $row["password"] != $pass) {
            return 0; // usuario/contraseña incorrecta
        }
        else return 1; // usuario/contraseña correcta
    }

}
?>