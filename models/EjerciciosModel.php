<?php
class EjerciciosModel extends ModelBase
{
	public function listadoTotal()
	{
		//realizamos la consulta de todos los items
		$consulta = $this->db->prepare('SELECT * FROM ejercicio');
		$consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return $consulta;
	}

    public function getvideo($id_ejercicio)
    {
        $consulta = $this->db->prepare('SELECT video from ejercicio where id_ejercicio=:id');
        $consulta->bindParam(":id",$id_ejercicio,PDO::PARAM_INT);
        $consulta->execute();

    return $consulta;

    }

    public function save ($name,$link){

        $consulta = $this->db->prepare('INSERT INTO ejercicio (nombre,video) VALUES (:name,:link);');

        $consulta->bindParam(":name",$name);
        $consulta->bindParam(":link",$link);

        return $consulta->execute();
    }

    public function lastAdded($name){

        $consulta = $this->db->prepare('SELECT * from ejercicio where nombre=:name');
        $consulta->bindParam(":name",$name,PDO::PARAM_STR);
        $consulta->execute();

    return $consulta;

    }

    public function selectEjercicioZona($zona){

        $consulta = $this->db->prepare("SELECT * from ejercicio where zona='".$zona."' ");
        $consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return $consulta;
    

    }
    public function saveCicloEjercicio($zona){

        $consulta = $this->db->prepare("INSERT INTO ciclo_ejercicio (id_ejercicio,id_user,id_ciclo,maximal,carga,repeticiones,series,pausa) VALUES (".$zona.",".$zona.")");
        $consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return $consulta;


    }

}
?>