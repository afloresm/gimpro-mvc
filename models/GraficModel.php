<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cheo
 * Date: 28/10/11
 * Time: 0:56
 * To change this template use File | Settings | File Templates.
 */
 
class GraficModel extends ModelBase {

    public function listarImc($id){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare("SELECT * FROM imc WHERE id_user='".$id."' ");
		$consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return $consulta;
    }
public function IdUser($userName){
    //realizamos la consulta de todos los items
		$consulta = $this->db->prepare("SELECT id_user FROM usuario WHERE username='".$userName."' ");
		$consulta->execute();
       $row = $consulta->fetch(PDO::FETCH_ASSOC);
       
		//devolvemos la coleccion para que la vista la presente.
		return $row['id_user'];

}
        public function listarConsumoAlcohol(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare("SELECT COUNT(*),respuesta FROM encuesta WHERE respuesta = 'no consumo alcohol'");
		$consulta->execute();
		 $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['COUNT(*)'];
    }
    public function listarConsumoTabaco(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*),respuesta FROM encuesta WHERE respuesta='no consumo cigarrillos'" );
		$consulta->execute();
		$row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['COUNT(*)'];
    }
      public function listarConsumoDrogas(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*),respuesta FROM encuesta WHERE respuesta='no consumo drogas'" );
		$consulta->execute();
		$row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['COUNT(*)'];
    }

     public function listarConsumoMedicamentos(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*),respuesta FROM encuesta WHERE respuesta='no consumo medicamentos'" );
		$consulta->execute();
		$row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['COUNT(*)'];
    }
     public function listarTotalEncuestados(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(SELECT DISTINCT id_user) FROM encuesta");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['COUNT(*)'];
     }
  public function listarNoActividadFisica(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) respuesta FROM encuesta WHERE respuesta='No realizo Actividades Físicas'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
      

		//devolvemos la coleccion para que la vista la presente.
		return $row['respuesta'];
     }
  public function listarUnaTresActividadFisica(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) respuesta FROM encuesta WHERE respuesta='1 a 3 Días'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['respuesta'];
     }
  public function listarCuantroCincoActividadFisica(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) respuesta FROM encuesta WHERE respuesta='4 a 5 Días'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['respuesta'];
     }
    public function listarTodoDiasActividadFisica(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) respuesta FROM encuesta WHERE respuesta='Todos los Días'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['respuesta'];
     }
    public function listarNoEnfermedades(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM enfermedades WHERE tipo='No tiene enfermedades'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarOtroEnfermedades(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM enfermedades WHERE tipo='otra'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarCardiacaEnfermedades(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM enfermedades WHERE tipo='cardiaca'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarHepaticaEnfermedades(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM enfermedades WHERE tipo='hepatica'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarSexualesEnfermeddes(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM enfermedades WHERE tipo='sexuales'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarRespiratoriaEnfermedades(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM enfermedades WHERE tipo='respiratorias'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarBrazoLesiones(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM lesiones WHERE tipo='brazos'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarPiernaLesiones(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM lesiones WHERE tipo='piernas'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarOtraLesiones(){
        //realizamos la consulta de todos los items
		$consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM lesiones WHERE tipo='otra'");
		//$row = $consulta->fetch(PDO::FETCH_ASSOC);
    	$consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

		//devolvemos la coleccion para que la vista la presente.
		return $row['tipo'];
     }
    public function listarToraxLesiones(){
           //realizamos la consulta de todos los items
           $consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM lesiones WHERE tipo='torax'");
           //$row = $consulta->fetch(PDO::FETCH_ASSOC);
           $consulta->execute();
           $row = $consulta->fetch(PDO::FETCH_ASSOC);

           //devolvemos la coleccion para que la vista la presente.
           return $row['tipo'];
        }
     public function listarNoTieneLesiones(){
           //realizamos la consulta de todos los items
           $consulta = $this->db->prepare ("SELECT COUNT(*) tipo FROM lesiones WHERE tipo='no tiene'");
           //$row = $consulta->fetch(PDO::FETCH_ASSOC);
           $consulta->execute();
           $row = $consulta->fetch(PDO::FETCH_ASSOC);

           //devolvemos la coleccion para que la vista la presente.
           return $row['tipo'];
        }


}