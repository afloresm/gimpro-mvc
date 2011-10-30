<?php

session_start();
$_SESSION['logeado'] = 1;
$_SESSION['id'] = $id;

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Gimnasio III - Defider UTFSM</title>
		
		<link rel="stylesheet" href="public/css/reset.css" type="text/css" >
		<link rel="stylesheet" href="public/css/login.css" type="text/css" >
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		
		<script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="public/js/jquery.imghover-1.1rc.js"></script>
		
		<script>
			$(window).load(function(){
  				$('#wrapper').fadeIn(2300);
  				$('div.logos').imghover({suffix: '-hovered' , fade: 'true' , fadeSpeed: 500}); 				
			});
		</script>
		
	</head>
	<body id="encuesta">
    <div id="wrapper">
    <h1><a href="encuesta.php">Resultados encuesta</a></h1>
     <table>

		<td><b>Desayuno:</b> <?php echo $resp0;   ?></td>
         <tr></tr>
        <td><b>Almuerzo:</b> <?php echo $resp1;   ?></td>
         <tr></tr>
        <td><b>Consumo de agua:</b> <?php echo $resp2;   ?></td>
         <tr></tr>
        <td><b>Tabaco:</b> <?php echo $resp3;   ?></td>
         <tr></tr>
        <td><b>Alcohol:</b> <?php echo $resp4;   ?></td>
         <tr></tr>
        <td><b>Drogas:</b> <?php echo $resp5;   ?></td>
         <tr></tr>

          <td><b>Enfermedades:</b> <?php echo $resp6;   ?></td>
          <tr></tr>

         <td><b>Lesiones:</b> <?php echo $resp7;   ?></td>
          <tr></tr>

         <td><b>Medicamento:</b> <?php echo $resp8;   ?></td>
          <tr></tr>

         <td><b>Autestima:</b> <?php echo $resp9;   ?></td>
          <tr></tr>

         <td><b>Actividad física:</b> <?php echo $resp10;   ?></td>


         </table>
        </div>


    </body>
</html>