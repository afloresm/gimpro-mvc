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
}
?>