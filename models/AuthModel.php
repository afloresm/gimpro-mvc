<?php

class AuthModel extends ModelBase
{

    public function Validar($user, $pass, $perfil){

        if($perfil=='alumno'){

            $q = $this->db->prepare("SELECT password from usuario where username=:usuario");
            $q->bindParam(':usuario', $user);
            $q->execute();
            $row = $q->fetch(PDO::FETCH_ASSOC);
            if ($row["password"] == "" || $row["password"] != $pass) {
             return 0; // usuario/contraseña incorrecta
            }
            else return 1; // usuario/contraseña correcta

        }else {
        $q = $this->db->prepare("SELECT password from profesor where username=:usuario");
        $q->bindParam(':usuario', $user);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if ($row["password"] == "" || $row["password"] != $pass) {
            return 0; // usuario/contraseña incorrecta
        }
        else return 1; // usuario/contraseña correcta 
    }

    }

      public function getID($user,$pass,$perfil){

        if($perfil=='alumno'){
        $consulta = $this->db->prepare("SELECT id_user FROM usuario WHERE username=:usuario and password=:password");
        $consulta->bindParam(':usuario', $user);
        $consulta->bindParam(':password', $pass);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) {
            $id=$row['id_user'];
            return $id; }
        else return false;
        }else {
        $consulta = $this->db->prepare("SELECT id_profesor FROM profesor WHERE username=:usuario and password=:password");
        $consulta->bindParam(':usuario', $user);
        $consulta->bindParam(':password', $pass);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) {
            $id=$row['id_profesor'];
            return $id; }
        else return false;
        }
    }

    public function status($id){

        $consulta = $this->db->prepare("SELECT habilitado FROM usuario WHERE id_user=:id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) {
            $i=$row['habilitado'];
            return $i; }
        else return false;
        }



}
