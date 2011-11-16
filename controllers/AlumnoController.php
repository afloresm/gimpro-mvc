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

  public function resultado(){

      require 'models/EncuestaModel.php';

      session_start();
      $id= $_SESSION['id'];
      $encuesta = new EncuestaModel();
      $data['resp0'] = $encuesta->get_respuesta($id,0);
      $data['resp1'] = $encuesta->get_respuesta($id,1);
      $data['resp2'] = $encuesta->get_respuesta($id,2);
      $data['resp3'] = $encuesta->get_respuesta($id,3);
      $data['resp4'] = $encuesta->get_respuesta($id,4);
      $data['resp5'] = $encuesta->get_respuesta($id,5);
      $data['resp6'] = $encuesta->get_respuesta($id,6);
      $data['resp7'] = $encuesta->get_respuesta($id,7);
      $data['resp8'] = $encuesta->get_respuesta($id,8);
      $data['resp9'] = $encuesta->get_respuesta($id,9);
      $data['resp10'] = $encuesta->get_respuesta($id,10);

      $this->view->show("resultados.php",$data);

  }

  public function home(){
       session_start();
       $data['habilitado'] = $_SESSION['habilitado'];
       $this->view->show("home.php",$data);

  }

  function Graficos(){
        require 'controllers/GraficController.php';

           $grafic=new GraficController();

        $grafic->ListarImc();

           $this->view->show("GraficPeso.html");
    }


  /*  public function actualizar_datos(){

        $alumno = new AlumnosModel();
        $mensaje="";
        $id=$_POST['id'];
        $fecha_nacimiento = $_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"];
        $r = $alumno->update_personal($id,$_POST["nombres"],$_POST["apellidos"],$fecha_nacimiento,$_POST["rut"],$_POST["ciudad"],$_POST["celular"],$_POST["email"]);

        if($r){
         $perfil = new PerfilController();
         $perfil->show('alumno');
        }
        else {
              $mensaje .= '<script name="accion">alert("No se pudo actualizar sus datos, intentelo denuevo por favor") </script>';
          echo $mensaje;
          $this->cuenta();
        }

    }*/

}
?>


