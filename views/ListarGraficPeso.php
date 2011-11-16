<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    
    <script>
        $(window).load(function() {
            $('#wrapper').fadeIn(2300);
            $('div.logos').imghover({suffix: '-hovered' , fade: 'true' , fadeSpeed: 500});
        });
    </script>

<?php
$xml = fopen ("views/dataPeso.xml", "w");
      if (!$xml) {
          echo "No se pudo abrir el archivo XML.";
          exit;
      }
      fwrite ($xml, '<?xml version="1.0"' . '?' .'> <chart> <categories> <item>Fecha</item> </categories>');
   while ($row = $listado->fetch()){
      $contenidoxml = ' <series> <name>'. $row["fecha_registro"] .'</name>';
      $contenidoxml .='<data> <point>'. $row["peso"]. '</point> </data> </series>';
      
      fwrite ($xml, $contenidoxml);
      }
fwrite ($xml, " </chart> ");

if (fclose ($xml)){
   //echo "Archivo escrito con exito";
    } else {
      exit ("Error escribiendo el XML");
}
?>



