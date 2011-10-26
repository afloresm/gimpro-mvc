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

		//Le pedimos al modelo todos los items
		$respuesta = $registar->validar_login($_POST['user']);
        
		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['respuesta'] = $respuesta;

        
        if($data['respuesta']){

            $fecha_nacimiento = $_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"];

            // Almacena datos personales del alumno
            $r=$registar->save($_POST['user'],$_POST['pass'],$_POST['nombres'],$_POST['ape'],$_POST['gen'],$fecha_nacimiento,$_POST['rut'],$_POST['rol'],$_POST['carrera'],$_POST['ciudad'],$_POST['celular'],$_POST['email']);

            $data['respuesta'] = $r;

            if($r){

              $id=$registar->getID($_POST['user'],$_POST['pass']);
              $data['respuesta'] = $id;

                if($id != false) {

                  $data['respuesta'] = $id;
                  $this->view->show("encuesta.php", $data);
                }else  $this->view->show("index.php", $data);
            } else { echo "Alumno no registrado";
                     $this->view->show("index.php", $data);
                     }
        }else { echo "Username repetido";
                $this->view->show("registrar.php", $data);
                }

   }

    

}
