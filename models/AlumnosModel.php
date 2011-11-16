<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 24-10-11
 * Time: 04:57 PM
 * To change this template use File | Settings | File Templates.
 */

class AlumnosModel extends ModelBase {

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

    public function datos($id){

        $consulta = $this->db->prepare("SELECT * FROM usuario WHERE id_user=:id");
        $consulta->bindParam(':id', $id);
        $r=$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) return $row; 
        else return false;
    }

    public function update_personal($id,$nombres,$apellidos,$fecha_nacimiento,$rut,$ciudad,$celular,$email){

        $consulta = $this->db->prepare("UPDATE usuario SET nombres=:nombres, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, rut=:rut, ciudad=:ciudad, celular=:celular, email=:email WHERE id_user=:id ");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':nombres', $nombres);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $consulta->bindParam(':rut', $rut);
        $consulta->bindParam(':ciudad', $ciudad);
        $consulta->bindParam(':celular', $celular);
        $consulta->bindParam(':email', $email);
        $r=$consulta->execute();

        if($r) return true;
        else return false;
    }

     public function update_academic($id,$carrera,$rol){

        $consulta = $this->db->prepare("UPDATE usuario SET carrera=:carrera, rol=:rol WHERE id_user=:id ");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':carrera', $carrera);
        $consulta->bindParam(':rol', $rol);
        $r=$consulta->execute();

        if($r) return true;
        else return false;
    }

      public function update_cuenta($id,$username,$password){
     
        $consulta = $this->db->prepare("UPDATE usuario SET username=:username, password=:password WHERE id_user=:id ");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':username', $username);
        $consulta->bindParam(':password', $password);
        $r=$consulta->execute();

        if($r) return true;
        else return false;
    }


public function lesiones($id){

        $consulta = $this->db->prepare("SELECT * FROM lesiones WHERE id_user=:id");
        $consulta->bindParam(':id', $id);
        $row=$consulta->execute();
        $row=array();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        $k=1;
        $result=array();

            var_dump($row);
        
          foreach ($row as $value => $key ){
                $result[$k] = $key;
                echo $result[$k];
                 $k++;
            //    $row = $row[$k];
            }
     $tipo=$result[4];
       echo $tipo;
        
       return $tipo;

     //   if($row != 0){ echo $row['tipo']; return $row['tipo'];}
       // else return false;


}
}
?>