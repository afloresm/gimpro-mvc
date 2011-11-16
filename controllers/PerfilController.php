<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 10-11-11
 * Time: 06:13 PM
 * To change this template use File | Settings | File Templates.
 *
 * Identificar que tipo de usuario es: profesor o alumno y entregar las información correspondiente
 * para el menu y el entorno del perfilç
 *
 * Menu: string de cada link
 *       info para el controlador (Alumno o Profesor)
 *       funciones asociadas a cada link
 *
 * Other stuff:
 *
 *          string para el titulo
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 10-11-11
 * Time: 06:02 PM
 * To change this template use File | Settings | File Templates.
 */
 
class PerfilController extends ControllerBase {



    public function validate(){
        require 'models/AuthModel.php';

        $auth = new AuthModel();

        if (!isset($_SESSION['logeado'])){
            $validado = $auth->Validar($_POST['username'], $_POST['password'],$_POST['perfil']);
            if ($validado) {
                    $id = $auth->getID($_POST['username'], $_POST['password'],$_POST['perfil']);
                    $habilitado = $auth->status($id);

                     session_start();
                     $_SESSION['logeado'] = 1;
                     $_SESSION['perfil'] = $_POST['perfil'];
                     $_SESSION['id'] = $id;
                     $_SESSION['habilitado'] = $habilitado;
                     $this->show($_SESSION['perfil'],$habilitado,"");
            }
            else
                $this->view->show("login.php");
        }
    }

    public function session($id,$perfil,$habilitado,$data){

        session_start();
        $_SESSION['logeado'] = 1;
        $_SESSION['perfil'] = $perfil;
        $_SESSION['id'] = $id;
        $_SESSION['habilitado'] = $habilitado;
        $this->show($_SESSION['perfil'],$habilitado,$data);

    }

    public  function show($perfil,$habilitado,$data){

        require 'ProfesorController.php';

        if($perfil== 'profesor'){

            $estructura['titulo'] = 'Perfil Profesor';
            $estructura['controlador'] = 'Profesor';
            $estructura['habilitado'] = true;
            $menu_visual = array ('Home', 'Ejercicios', 'Perfil', 'Buscar Alumno', 'Estadísticas');
            $function['Home']='home';
            $function['Ejercicios']='ejercicios';
            $function['Perfil']='perfil';
            $function['Buscar Alumno']='buscar';
            $function['Estadísticas']='estadisticas';
            $respuestas="";

            $profesor = new ProfesorController();

            $welcome = $profesor->welcome();


        }else if($perfil== 'alumno' && $habilitado==true){
       
            $estructura['titulo'] = 'Perfil Alumno';
            $estructura['controlador'] = 'Alumno';
            $estructura['habilitado'] = $habilitado;
            $menu_visual = array ('Home', 'Mi cuenta', 'Mi perfil físico', 'Gráficos','Nutrición');
            $function['Home']='home';
            $function['Mi cuenta']='cuenta';
            $function['Mi perfil físico']='fisico';
            $function['Gráficos']='Graficos';
            $function['Nutrición']='nutrición';
            $welcome= "";
            $respuestas="";

            } else if($perfil== 'alumno' && $habilitado==false && $data=="" ){

            $estructura['titulo'] = 'Perfil Alumno';
            $estructura['controlador'] = 'Alumno';
            $estructura['habilitado'] = $habilitado;
            $respuestas = "";
            $menu_visual = array ('Home', 'Mi cuenta','Resultado encuesta');
            $function['Home']='home';
            $function['Mi cuenta']='cuenta';
            $function['Resultado encuesta']='resultado';

            $welcome= "";

            }else if($perfil== 'alumno' && $habilitado==false && $data!="" ){

            $estructura['titulo'] = 'Perfil Alumno';
            $estructura['controlador'] = 'Alumno';
            $estructura['habilitado'] = $habilitado;
            $respuestas = array ($data['resp0'],$data['resp1'],$data['resp2'],$data['resp3'],$data['resp4'],$data['resp5'],$data['resp6'],$data['resp7'],$data['resp8'],$data['resp9'],$data['resp10']);
            $menu_visual = array ('Home', 'Mi cuenta','Resultado encuesta');
            $function['Home']='home';
            $function['Mi cuenta']='cuenta';
            $function['Resultado encuesta']='resultado';
            $welcome= "";
        }

       $data['estructura']=$estructura;
       $data['menu_visual']=$menu_visual;
       $data['function']= $function;
       $data ['welcome'] = $welcome;
       $data['respuestas'] = $respuestas;

       $this->view->show("perfil.php",$data);
}
    //actualiza datos personales del alumno
    public function actualizar_datos(){

        require 'models/AlumnosModel.php';
        $a = new AlumnosModel();
        session_start();
        $mensaje="";
       // $id=$_POST['id'];
        $fecha_nacimiento = $_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"];
        $r = $a->update_personal($_SESSION['id'],$_POST["nombres"],$_POST["apellidos"],$fecha_nacimiento,$_POST["rut"],$_POST["ciudad"],$_POST["celular"],$_POST["email"]);

        if($r){

            $mensaje .= '<script name="accion">alert("Cambios realizados con éxito") </script>';
             echo $mensaje;
           $this->show($_SESSION['perfil'],$_SESSION['habilitado'],"");}

        else {
              $mensaje .= '<script name="accion">alert("No se pudo actualizar sus datos, intentelo denuevo por favor") </script>';
          echo $mensaje;
          $this->show($_SESSION['perfil'],$_SESSION['habilitado'],"");
        }

     }

      //actualiza datos académicos del alumno
    public function actualizar_academicos(){

        require 'models/AlumnosModel.php';
        $a = new AlumnosModel();
        session_start();
        $mensaje="";
        $r = $a->update_academic($_SESSION['id'],$_POST["carrera"],$_POST["rol"]);

        if($r){
             $mensaje .= '<script name="accion">alert("Cambios realizados con éxito") </script>';
             echo $mensaje;
             $this->show($_SESSION['perfil'],$_SESSION['habilitado'],"");}

        else {
              $mensaje .= '<script name="accion">alert("No se pudo actualizar sus datos, intentelo denuevo por favor") </script>';
          echo $mensaje;
          $this->show($_SESSION['perfil'],$_SESSION['habilitado'],"");
        }

     }

      //actualiza datos de la cuenta del alumno
    public function actualizar_cuenta(){

        require 'models/AlumnosModel.php';
        $a = new AlumnosModel();
        session_start();
        $mensaje="";
        $r = $a->update_cuenta($_SESSION['id'],$_POST["user"],$_POST["pass"]);

        if($r){
             $mensaje .= '<script name="accion">alert("Cambios realizados con éxito") </script>';
             echo $mensaje;
             $this->show($_SESSION['perfil'],$_SESSION['habilitado'],"");}

        else {
              $mensaje .= '<script name="accion">alert("No se pudo actualizar sus datos, intentelo denuevo por favor") </script>';
          echo $mensaje;
          $this->show($_SESSION['perfil'],$_SESSION['habilitado'],"");
        }

     }
}

?>