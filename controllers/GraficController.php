<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cheo
 * Date: 28/10/11
 * Time: 1:06
 * To change this template use File | Settings | File Templates.
 */
 
 class GraficController extends ControllerBase {

    public function ListarImc(){
        //Incluye el modelo que corresponde
		require 'models/GraficModel.php';

		//Creamos una instancia de nuestro "modelo"
		$items = new GraficModel();
        session_start();
		
		$listado = $items->listarImc($_SESSION['id']);

		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['listado'] = $listado;

		//Finalmente presentamos nuestra plantilla
		$this->view->show("ListarGraficPeso.php", $data);

    }

    public function ListarGraficConsumo(){
        //Incluye el modelo que corresponde
		require 'models/GraficModel.php';

		//Creamos una instancia de nuestro "modelo"
		$items = new GraficModel();
		//Le pedimos al modelo todos los items

		$Alcohol = $items->listarConsumoAlcohol();
        $Drogas = $items->listarConsumoDrogas();
        $Medicamentos = $items->listarConsumoMedicamentos();
        $TotalEncuestados= $items->listarTotalEncuestados();
        $Tabaco = $items->listarConsumoTabaco();
        $TotalEncuestados= print_r($TotalEncuestados);


   $xml = fopen ("views/dataConsumo.xml", "w");
      if (!$xml) {
          echo "No se pudo abrir el archivo XML.";
          exit;
      }
      fwrite ($xml, '<?xml version="1.0"' . '?' .'> <chart> <categories> <item>SI consume</item><item>NO consume</item> </categories>');

      $contenidoxml ='<series> <name> Alcohol</name> <data> <point>'.($TotalEncuestados-$Alcohol). '</point>  <point>'.($Alcohol). '</point> </data> </series>';
      $contenidoxml .='<series> <name> Drogas</name> <data> <point>'.($TotalEncuestados-$Drogas). '</point>  <point>'.($Drogas). '</point> </data> </series>';
      $contenidoxml .='<series> <name> Medicamentos</name> <data> <point>'.($TotalEncuestados-$Medicamentos). '</point>  <point>'.($Medicamentos). '</point> </data> </series>';
      $contenidoxml .='<series> <name> Tabaco</name> <data> <point>'.($TotalEncuestados-$Tabaco). '</point>  <point>'.($Tabaco). '</point> </data> </series>';
      fwrite ($xml, $contenidoxml);
      
fwrite ($xml, " </chart> ");

if (fclose ($xml)){
   //echo "Archivo escrito con exito";
    } else {
      exit ("Error escribiendo el XML");
}

    }
public function ListarGraficActFisica(){
        //Incluye el modelo que corresponde
		//require 'models/GraficModel.php';

		//Creamos una instancia de nuestro "modelo"
		$items = new GraficModel();
		//Le pedimos al modelo todos los items

		$NoRealiza = $items->listarNoActividadFisica();
        $UnoAtres = $items->listarUnaTresActividadFisica();
        $CuatroAcinco = $items->listarCuantroCincoActividadFisica();
        $TodoDias= $items->listarTodoDiasActividadFisica();


        

   $xml = fopen ("views/dataActFisica.xml", "w");
      if (!$xml) {
          echo "No se pudo abrir el archivo XML.";
          exit;
      }
      fwrite ($xml, '<?xml version="1.0"' . '?' .'> <AgingReport>');

      $contenidoxml  =' <ttHeader> <CustomerName>No realiza Actividad Fisica </CustomerName><TotalAmount>'. $NoRealiza.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Realiza 1 a 3 dias </CustomerName><TotalAmount>'. $UnoAtres.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Realiza 4 a 5 dias </CustomerName><TotalAmount>'. $CuatroAcinco.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Realiza todo los dias</CustomerName><TotalAmount>'. $TodoDias.'</TotalAmount> </ttHeader>';

      fwrite ($xml, $contenidoxml);

fwrite ($xml, "</AgingReport>");

if (fclose ($xml)){
   //echo "Archivo escrito con exito";
    } else {
      exit ("Error escribiendo el XML");
}

    }
    public function ListarGraficEnfermedades(){
        //Incluye el modelo que corresponde
		//require 'models/GraficModel.php';

		//Creamos una instancia de nuestro "modelo"
		$items = new GraficModel();
		//Le pedimos al modelo todos los items

		$NoTiene = $items->listarNoEnfermedades();
        $cardiacas = $items->listarCardiacaEnfermedades();
        $sexuales = $items->listarSexualesEnfermeddes();
        $otra= $items->listarOtroEnfermedades();
        $Hepaticas=$items->listarHepaticaEnfermedades();
        $respiratoria=$items->listarRespiratoriaEnfermedades();

    
   $xml = fopen ("views/dataEnfermedades.xml", "w");
      if (!$xml) {
          echo "No se pudo abrir el archivo XML.";
          exit;
      }
      fwrite ($xml, '<?xml version="1.0"' . '?' .'> <AgingReport>');

      $contenidoxml  =' <ttHeader> <CustomerName>No Tiene enfermedades </CustomerName><TotalAmount>'. $NoTiene.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Cardiacas </CustomerName><TotalAmount>'. $cardiacas.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Hepaticas </CustomerName><TotalAmount>'. $Hepaticas.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Respiratorias </CustomerName><TotalAmount>'. $respiratoria.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Sexuales </CustomerName><TotalAmount>'. $sexuales.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Otra Enfermedad </CustomerName><TotalAmount>'. $otra.'</TotalAmount> </ttHeader>';
fwrite ($xml, $contenidoxml);

fwrite ($xml, "</AgingReport>");

if (fclose ($xml)){
   //echo "Archivo escrito con exito";
    } else {
      exit ("Error escribiendo el XML");
}

    }
       public function ListarGraficLesiones(){
        //Incluye el modelo que corresponde
		//require 'models/GraficModel.php';

		//Creamos una instancia de nuestro "modelo"
		$items = new GraficModel();
		//Le pedimos al modelo todos los items

		$NoTiene = $items->listarNoTieneLesiones();
        $brazos = $items->listarBrazoLesiones();
        $pierna = $items->listarPiernaLesiones();
        $otra= $items->listarOtraLesiones();
        $torax=$items->listarToraxLesiones();


        
   $xml = fopen ("views/dataLesiones.xml", "w");
      if (!$xml) {
          echo "No se pudo abrir el archivo XML.";
          exit;
      }
      fwrite ($xml, '<?xml version="1.0"' . '?' .'> <AgingReport>');

      $contenidoxml  =' <ttHeader> <CustomerName>No Tiene LEsiones </CustomerName><TotalAmount>'. $NoTiene.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Brazos </CustomerName><TotalAmount>'. $brazos.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Pierna </CustomerName><TotalAmount>'. $pierna.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Torax </CustomerName><TotalAmount>'. $torax.'</TotalAmount> </ttHeader>';
      $contenidoxml .=' <ttHeader> <CustomerName>Otra Zona </CustomerName><TotalAmount>'. $otra.'</TotalAmount> </ttHeader>';
fwrite ($xml, $contenidoxml);

fwrite ($xml, "</AgingReport>");

if (fclose ($xml)){
   //echo "Archivo escrito con exito";
    } else {
      exit ("Error escribiendo el XML");
}

    }
}
