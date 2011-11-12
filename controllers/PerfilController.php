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


   public  function show($perfil){

        require 'ProfesorController.php';
        //require 'AlumnoController.php';

        if($perfil== 'profesor'){

            $estructura['titulo'] = 'Perfil Profesor';
            $estructura['controlador'] = 'Profesor';
            $menu_visual = array ('Home', 'Ejercicios', 'Perfil', 'Buscar Alumno', 'Estadísticas');
            $function['Home']='home';
            $function['Ejercicios']='ejercicios';
            $function['Perfil']='perfil';
            $function['Buscar Alumno']='buscar';
            $function['Estadísticas']='estadisticas';

            $profesor = new ProfesorController();

            $welcome = $profesor->welcome();


        }else if($perfil== 'alumno'){

            $estructura['titulo'] = 'Perfil Alumno';
            $estructura['controlador'] = 'Alumno';
            $menu_visual = array ('Home', 'Mi cuenta', 'Mi perfil físico', 'Gráficos','Nutrición');
            $function['Home']='home';
            $function['Mi cuenta']='cuenta';
            $function['Mi perfil físico']='fisico';
            $function['Gráficos']='gráficos';
            $function['Nutrición']='nutrición';
         //   $welcome= "";

            $profesor = new ProfesorController();

            $welcome = $profesor->welcome();
            }

       $data['estructura']=$estructura;
       $data['menu_visual']=$menu_visual;
       $data['function']= $function;
       $data ['welcome'] = $welcome;

       $this->view->show("perfil.php",$data);
}
}

?>