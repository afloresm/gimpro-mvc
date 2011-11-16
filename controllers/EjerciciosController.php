<?php
class EjerciciosController extends ControllerBase
{
    public function listar()
    {
        require 'models/EjerciciosModel.php';
        //Incluye el modelo que corresponde
        //Creamos una instancia de nuestro "modelo"
        $items = new EjerciciosModel();

        //Le pedimos al modelo todos los items
        $listado = $items->listadoTotal();


        //Pasamos a la vista toda la informaci�n que se desea representar

        //$listado;
        //$data['listado'] = $listado;

        return $listado;
        //Finalmente presentamos nuestra plantilla
        //$this->view->show("listar.php", $data);
    }

    public function video()
    {

        $id = $_GET['id'];


        require 'models/EjerciciosModel.php';

        $ejercicio = new EjerciciosModel();

        $video = $ejercicio->getvideo($id);
        $result = $video->fetch();

        echo $result["video"];


    }

    public function agregar()
    {
        require 'models/EjerciciosModel.php';

        $save= new EjerciciosModel();

        $name = $_POST['name'];
        $link = $_POST['link'];

        if ($save->save($name,$link))
        {
            $result=$save->lastAdded($name)->fetch();

            echo $result["id_ejercicio"];
    
        }

        else echo "-1";
        
    }

    public function eliminar()
    {
        echo 'Eliminacion de items';
    }

    public function ListarZona(){

		require 'models/EjerciciosModel.php';
         $id_zona = $_POST['id_zona'];
		//Creamos una instancia de nuestro "modelo"
		$items = new EjerciciosModel();

		$listado = $items->selectEjercicioZona($id_zona);

		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['listado'] = $listado;

		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_ejercicios.php", $data);
}

      public function GuardarCicloEjercicio(){

		require 'models/EjerciciosModel.php';

          $maximal = $_POST['maximal'];
          $carga = $_POST['carga'];
          $peso = $_POST['peso'];
          $repeticiones = $_POST['repeticiones'];
          $series = $_POST['series'];



        
}
}
?>