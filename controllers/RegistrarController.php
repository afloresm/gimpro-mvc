<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 24-10-11
 * Time: 05:40 PM
 * To change this template use File | Settings | File Templates.
 */
 
class RegistrarController extends ControllerBase {


    public  function guardar(){

        //Incluye el modelo que corresponde
		require 'models/RegistrarModel.php';

        //Creamos una instancia de nuestro "modelo"
		$registar = new RegistrarModel();

		//Valida si es un user válido
		$respuesta = $registar->validar_login($_POST['user']);
        $data['respuesta'] = $respuesta;

        // Si es un user válido se procede a realizar el registro
        if($data['respuesta']){

            $fecha_nacimiento = $_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"];

            // Almacena datos personales del alumno
            $r=$registar->save($_POST['user'],$_POST['pass'],$_POST['nombres'],$_POST['ape'],$_POST['gen'],$fecha_nacimiento,$_POST['rut'],$_POST['rol'],$_POST['carrera'],$_POST['ciudad'],$_POST['celular'],$_POST['email']);
            $data['respuesta'] = $r;

            if($r){

              //Función que obtiene el id del alumno
              $id=$registar->getID($_POST['user'],$_POST['pass']);
              $data['respuesta'] = $id;

                if($id != false) {

                 //Almacena datos físicos del alumno
                  $r=$registar->save_IMC($id,$_POST['peso'],$_POST['altura']);

                    if($r){
                         $data['respuesta'] = $id;
                     //    echo "Alumno registrado";
                         $this->view->show("encuesta.php",$data);
                    }else{ echo "No se registraron los datos físicos del alumno, vuelva a intentarlo por favor";
                           $this->view->show("registrar.php", $data);}
                }else  $this->view->show("registrar.php", $data);
            } else { echo "Alumno no registrado";
                     $this->view->show("index.php", $data);
                     }
        }else { echo "Username repetido, digite uno nuevo";
                $this->view->show("registrar.php", $data);
                }

   }

    

}
