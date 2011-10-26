<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 26-10-11
 * Time: 03:15 PM
 * To change this template use File | Settings | File Templates.
 */
 
class EncuestaController extends ControllerBase {

        public  function guardar(){

        //Incluye el modelo que corresponde
		require 'models/EncuestaModel.php';

        //Creamos una instancia de nuestro "modelo"
		$encuesta = new EncuestaModel();

        //Cálculo de la encuesta
        $id = $_POST["id"];
        $ranking =0;

        if($_POST["desayuno"]==0){ $ranking+=0;  $resp[0]="No tomo desayuno";}
	    else if($_POST["desayuno"]==1){ $ranking+=0;  $resp[0]="Solo tomo Líquidos (Leche,Café,Té,Jugo)";}
	    else if($_POST["desayuno"]==2){ $ranking+=5; $resp[0]="Tomo Líquidos y Consumo Cereales, Pan";}
	    else if ($_POST["desayuno"]==3){ $ranking+=8; $resp[0]="Consumo Cereales, Lácteos y Frutas";}

	    if($_POST["almuerzo"]==0){ $ranking+=0; $resp[1]="No Almuerzo";}
	    else if($_POST["almuerzo"]==1){ $ranking+=4; $resp[1]="Comida Rápida (Completo,Empanadas,Pizzas)";}
        else if ($_POST["almuerzo"]==2){ $ranking+=7; $resp[1]="Soy Vegetariano";}
	    else if ($_POST["almuerzo"]==3){ $ranking+=10; $resp[1]="Balanceado (comida casera, almuerzo de la U)";}

	    if($_POST["agua"]==0){ $ranking+=0; $resp[2]="No tomo agua, solo bebidas y jugos";}
	    else if($_POST["agua"]==1){ $ranking+=2; $resp[2]="1 Litro";}
	    else if ($_POST["agua"]==2){ $ranking+=3; $resp[2]="2 Litros";}
    	else if ($_POST["agua"]==3){ $ranking+=5; $resp[2]="3 Litros o más";}

	    if ($_POST["tabaco"]=="si"){ $ranking+=0; $resp[3]=$_POST["tabaco"].".".$_POST["tabacoCantidad"]."cigarrilos";}
	    else if ($_POST["tabaco"]=="no"){ $ranking+=7; $resp[3]=$_POST["tabaco"]." consumo cigarrillos";}

	    if ($_POST["alcohol"]=="si"){ $ranking+=0; $resp[4]=$_POST["alcohol"].".".$_POST["alcoholCantidad"]." vaso(s)";}
	    else if ($_POST["alcohol"]=="no"){ $ranking+=3; $resp[4]=$_POST["tabaco"]."consumo alcohol";}

	    if ($_POST["drogas"]=="si"){ $ranking+=0; $resp[5]=$_POST["drogas"].".".$_POST["drogasCantidad"]."veces";}
	    else if ($_POST["drogas"]=="no"){ $ranking+=10; $resp[5]=$_POST["drogas"]." consumo drogas";}

	    if ($_POST["cardiaca"]=="si"){ $ranking+=5; $resp[6]="Zona afectada:Cardiaca.Enfermedad: ".$_POST["ecardiaca"];}
	    if ($_POST["hepatica"]=="si"){ $ranking+=3; $resp[6]="Zona afectada:Hepática.Enfermedad: ".$_POST["ehepatica"];}
        if ($_POST["sexual"]=="si"){ $ranking+=3; $resp[6]="Zona afectada:Sexual.Enfermedad: ".$_POST["esexual"];}
        if ($_POST["respiratoria"]=="si"){ $ranking+=5; $resp[6]="Zona afectada:Respiratoria.Enfermedad: ".$_POST["erespiratoria"];}
        if ($_POST["otra"]=="si"){ $ranking+=3; $resp[6]="Zona afectada:Otra.Enfermedad: ".$_POST["eotra"];}

	    if ($_POST["brazos"]=="si"){ $ranking+=2; $resp[7]="Lesión:Brazos.Nombre: ".$_POST["lbrazos"];}
        if ($_POST["piernas"]=="si"){ $ranking+=2; $resp[7]="Lesión:Piernas.Nombre: ".$_POST["lpiernas"];}
        if ($_POST["torax"]=="si"){ $ranking+=3; $resp[7]="Lesión:Torax.Nombre: ".$_POST["ltorax"];}
        if ($_POST["otra"]=="si"){ $ranking+=3; $resp[7]="Lesión:Otra.Nombre: ".$_POST["lotra"];}

	    if ($_POST["medica"]=="si"){ $ranking+=0; $resp[8]=$_POST["medica"].".Consumo:".$_POST["nombreMedica"];}
	    else if ($_POST["medica"]=="no"){ $ranking+=5; $resp[8]=$_POST["medica"]." consumo medicamentos"; }

	    if ($_POST["actFisica"]==0){ $ranking+=0; $resp[9]="No realizo Actividades Físicas";}
	    else if ($_POST["actFisica"]==1){ $ranking+=5; $resp[9]="Practico: 1 a 3 Días";}
	    else if ($_POST["actFisica"]==2){  $ranking+=10; $resp[9]="Practico: 4 a 5 Días";}
	    else if ($_POST["actFisica"]==3){ $ranking+=12; $resp[9]="Practico: Todos los Días";}

        // Almacena respuestas de la encuesta realizada por el alumno
		for($i=0;$i<10;$i++){
	       $respuesta=$encuesta->save($id,$i,$resp[$i]);
		   if($respuesta) echo "ok";
		   else{
           $data['respuesta'] = false;
           $this->view->show("encuesta.php", $data);
           }
		}
		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['respuesta'] = true;
        $this->view->show("perfil.php", $data);
     }
}