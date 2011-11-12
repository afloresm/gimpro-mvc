<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 11-11-11
 * Time: 05:02 PM
 * To change this template use File | Settings | File Templates.
 */
 require 'models/AlumnosModel.php';
 require 'controllers/PerfilController.php';

class AlumnoController extends ControllerBase {

    public static $id;

    public function cuenta(){
        session_start();
        $alumno = new AlumnosModel();

        $id= $_SESSION['id'];
        $data = $alumno->datos($id);
        $this->view->show("cuenta.php",$data);

    }

    public function actualizar_datos(){

        $alumno = new AlumnosModel();
        $mensaje="";
        $id=$_POST['id'];
        $fecha_nacimiento = $_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"];
        $r = $alumno->update_personal($id,$_POST["nombres"],$_POST["apellidos"],$fecha_nacimiento,$_POST["rut"],$_POST["ciudad"],$_POST["celular"],$_POST["email"]);

        if($r){
        return $alumno->datos($id);

        }
        else {
              $mensaje .= '<script name="accion">alert("No se pudo actualizar sus datos, intentelo denuevo por favor") </script>';
          echo $mensaje;
          $this->cuenta();
        }

    }

}
?>


