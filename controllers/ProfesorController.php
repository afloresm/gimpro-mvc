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

    function welcome()
    {
		require 'models/AlumnosModel.php';

		//Creamos una instancia de nuestro "modelo"
		$users = new AlumnosModel();

		//Le pedimos al modelo todos los items
		$listado = $users->lastRegister();

		//Pasamos a la vista toda la informaci�n que se desea representar
         return $listado;
    }

    function ejercicios(){

           require 'models/EjerciciosModel.php';

            $listarEjercicios= new EjerciciosModel();

            $lista = $listarEjercicios->listadoTotal();

           $data['listado'] = $lista;
           $this->view->show("ejercicios.php",$data);
    }
    function estadisticas(){
     
         require 'controllers/GraficController.php';
         
           $grafic=new GraficController();

        $grafic->ListarGraficConsumo();
        $grafic->ListarGraficEnfermedades();
       // $grafic->ListarGraficLesiones();
          //$grafic->ListarGraficActFisica();
           $this->view->show("estadistica.php");
    }

}
?>