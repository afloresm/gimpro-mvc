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

            $registar->guardar($_POST['id_user'],$_POST['username'],$_POST['password'],$_POST['nombres'],$_POST['apellidos'],$_POST['genero'],$_POST['fecha_nacimiento'],$_POST['rut'],$_POST['rol'],$_POST['carrera'],$_POST['ciudad'],$_POST['celular'],$_POST['email'],$_POST['dias_entrenamiento'],$_POST['observaciones'],$_POST['perfil'],$_POST['fecha_inicio'],$_POST['objetivo'],$_POST['ranking']);
            


        }

		//Finalmente presentamos nuestra plantilla
		$this->view->show("respuesta.php", $data);


    }

    

}
