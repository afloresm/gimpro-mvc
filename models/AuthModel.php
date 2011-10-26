<?php

class AuthModel extends ModelBase
{
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
