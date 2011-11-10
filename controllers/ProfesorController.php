<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 24-10-11
 * Time: 07:13 PM
 * To change this template use File | Settings | File Templates.
 */
 
class ProfesorController extends ControllerBase {

//Incluye el modelo que corresponde

function home()
    {
		require 'models/AlumnosModel.php';

		//Creamos una instancia de nuestro "modelo"
		$users = new AlumnosModel();

		//Le pedimos al modelo todos los items
		$listado = $users->lastRegister();

		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['last'] = $listado;

		//Finalmente presentamos nuestra plantilla
		$this->view->show("lastregister.php", $data);
    }

    function lastRegisters()
    {
		require 'models/AlumnosModel.php';

		//Creamos una instancia de nuestro "modelo"
		$users = new AlumnosModel();

		//Le pedimos al modelo todos los items
		$listado = $users->lastRegister();

		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['last'] = $listado;

		//Finalmente presentamos nuestra plantilla
		$this->view->show("lastregister.php", $data);
    }
}
?>