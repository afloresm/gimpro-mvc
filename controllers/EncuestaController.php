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
        require 'models/RegistrarModel.php';

        //Creamos una instancia de nuestro "modelo"
		$encuesta = new EncuestaModel();
        $registro = new RegistrarModel();

        $mensaje = "";

        //Cálculo de la encuesta
        $id = $_POST['id'];
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
	    else if ($_POST["alcohol"]=="no"){ $ranking+=3; $resp[4]=$_POST["alcohol"]."consumo alcohol";}

	    if ($_POST["drogas"]=="si"){ $ranking+=0; $resp[5]=$_POST["drogas"].".".$_POST["drogasCantidad"]."veces";}
	    else if ($_POST["drogas"]=="no"){ $ranking+=10; $resp[5]=$_POST["drogas"]." consumo drogas";}

	    if (isset($_POST["cardiaca"])){ $enfermedad=$_POST["ecardiaca"]; $tipoe="cardiaca"; $resp[6]="Zona afectada:Cardiaca.Enfermedad: ".$_POST["ecardiaca"];}
	    if (isset($_POST["hepatica"])){ $enfermedad=$_POST["ehepatica"]; $tipoe="hepatica"; $resp[6]="Zona afectada:Hepática.Enfermedad: ".$_POST["ehepatica"];}
        if (isset($_POST["sexual"])){   $enfermedad=$_POST["esexual"]; $tipoe="sexual"; $resp[6]="Zona afectada:Sexual.Enfermedad: ".$_POST["esexual"];}
        if (isset($_POST["respiratoria"])){ $enfermedad=$_POST["erespiratoria"];  $tipoe="respiratoria";$resp[6]="Zona afectada:Respiratoria.Enfermedad: ".$_POST["erespiratoria"];}
        if (isset($_POST["otrae"])){ $enfermedad=$_POST["eotra"]; $tipoe="otra"; $resp[6]="Zona afectada:Otra.Enfermedad: ".$_POST["eotra"];}
        if (isset($_POST["noenfermedad"])){ $enfermedad="no tiene enfermedad"; $tipoe="no tiene enfermedad"; $ranking+=19; $resp[6]="No tengo enfermedades";}

	    if (isset($_POST["brazos"])){ $lesion=$_POST["lbrazos"]; $tipol="brazos";  $resp[7]="Lesión:Brazos.Nombre: ".$_POST["lbrazos"];}
        if (isset($_POST["piernas"])){ $lesion=$_POST["lpiernas"]; $tipol="piernas"; $resp[7]="Lesión:Piernas.Nombre: ".$_POST["lpiernas"];}
        if (isset($_POST["torax"])){ $lesion=$_POST["ltorax"]; $tipol="torax"; $resp[7]="Lesión:Torax.Nombre: ".$_POST["ltorax"];}
        if (isset($_POST["otral"])){ $lesion=$_POST["lotral"]; $tipol="otra"; $resp[7]="Lesión:Otra.Nombre: ".$_POST["lotra"];}
        if (isset($_POST["nolesion"])){ $lesion="no tiene lesión"; $tipol="no tiene lesión"; $ranking+=10; $resp[7]="No tengo lesiones"; }

	    if ($_POST["medica"]=="si"){ $ranking+=0; $resp[8]=$_POST["medica"].".Consumo:".$_POST["nombreMedica"];}
	    else if ($_POST["medica"]=="no"){ $ranking+=5; $resp[8]=$_POST["medica"]." consumo medicamentos"; }

	    if ($_POST["autoestima"]==0){ $resp[9]="Autestima alta";}
	    else if ($_POST["autoestima"]==1){ $resp[9]="Autestima normal";}
	    else if ($_POST["autoestima"]==2){  $resp[9]="Autestima baja";}
	    
        if ($_POST["actFisica"]==0){ $ranking+=0; $resp[10]="No realizo Actividades Físicas";}
	    else if ($_POST["actFisica"]==1){ $ranking+=5; $resp[10]="Practico: 1 a 3 Días";}
	    else if ($_POST["actFisica"]==2){  $ranking+=10; $resp[10]="Practico: 4 a 5 Días";}
	    else if ($_POST["actFisica"]==3){ $ranking+=12; $resp[10]="Practico: Todos los Días";}

        // Almacena las respuestas de la encuesta realizada por el alumno
		for($i=0;$i<11;$i++){
	       $respuesta=$encuesta->save($id,$i,$resp[$i]);
		   if($respuesta){ }
		   else{
           $mensaje .= '<script name="accion">alert("No se logro completar el almacenamiento de la encuesta, vuelva a intentarlo por favor") </script>';
           echo $mensaje;
           $data['respuesta'] = $id;
           $this->view->show("encuesta.php", $data);
            break;
           }
		}
            //Almacena nota de la encuesta 
           $respuesta=$encuesta->save_ranking($id,$ranking);

            //Almacena enfermedades del alumno
           $respuesta=$registro->save_enfermedad($id,$enfermedad,$tipoe);
           $respuesta=$registro->save_lesion($id,$lesion,$tipol);

          if($respuesta){

          // Resultados de la encuesta
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
         }else{ $mensaje .= '<script name="accion">alert("No se logro obtener las respuesta de la encuesta, intente denuevo por favor") </script>';
           echo $mensaje;
           $this->view->show("encuesta.php",$data);}

		$data['id'] = $id;
        $this->view->show("resultados.php", $data);
     }
}