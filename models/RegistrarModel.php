<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 24-10-11
 * Time: 05:42 PM
 * To change this template use File | Settings | File Templates.
 */
 
class RegistrarModel extends ModelBase{

    public function validar_login($user){
        $consulta = $this->db->prepare("SELECT * FROM usuario WHERE username=:usuario");
        $consulta->bindParam(':usuario', $user);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

     	if ($row == 0){
		return true;
		}
	    return false;
    }

    public function save($user,$pass,$nombres,$apellidos,$genero,$fecha_nacimiento,$rut,$rol,$carrera,$ciudad,$celular,$email){

        $consulta = $this->db->prepare("INSERT INTO usuario (username, password, nombres, apellidos, genero, fecha_nacimiento, rut, rol, carrera, ciudad, celular, email) VALUES (:usuario,:pass,:nombres,:apellidos,:genero,:fecha_nacimiento,:rut,:rol,:carrera,:ciudad,:celular,:email) ");
        $consulta->bindParam(':usuario', $user);
        $consulta->bindParam(':pass', $pass);
        $consulta->bindParam(':nombres', $nombres);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':genero', $genero);
        $consulta->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $consulta->bindParam(':rut', $rut);
        $consulta->bindParam(':rol', $rol);
        $consulta->bindParam(':carrera', $carrera);
        $consulta->bindParam(':ciudad', $ciudad);
        $consulta->bindParam(':celular', $celular);
        $consulta->bindParam(':email', $email);
        $r=$consulta->execute();

        if($r) return true;
        else return false;
        }

    public function getID($user,$pass){

        $consulta = $this->db->prepare("SELECT id_user FROM usuario WHERE username=:usuario and password=:pass ");
        $consulta->bindParam(':usuario', $user);
        $consulta->bindParam(':password', $pass);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) {
            $id=$row['id_user'];
            return $id; }
        else return false; 
    }
}



