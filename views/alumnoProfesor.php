<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});


</script>

</head>

<body>

<div class="container">

    <ul class="tabs">
        <li><a href="#tab1">Datos personales</a></li>
        <li><a href="#tab2">Rutina</a></li>
        <li><a href="#tab3">lala</a></li>
    </ul>

    <div class="tab_container">

        <div id="tab1" class="tab_content">

    <td><input name="id_user" type = "hidden" value="<?php echo $id_user; ?>"></td>
    <table>
    <tr>
		<td>Nombre:</td>
		<td><?php echo $nombres." ".$apellidos; ?></td>
	</tr>
	<?php
	$temp = explode("-",$fecha_nacimiento);
    ?>
	<tr>
		<td>Fecha de nacimiento:</td>
		<td><?php echo $temp[2]."-".$temp[1]."-".$temp[0]; ?></td>
	</tr>
	<tr>
		<td>Ciudad:</td>
		<td><?php echo $ciudad; ?></td>
	</tr>
	<tr>
		<td>Fono:</td>
		<td><?php echo $celular; ?></td>
	</tr>
	<tr>
		<td>Carrera:</td>
		<td><?php echo $carrera; ?></td>
	</tr>
    <tr>
		<td>Fecha de inicio:</td>
		<td><?php echo $fecha_inicio; ?></td>
	</tr>
	 <tr>
   <td>Lesiones:</td>
		<td><?php   echo $lesion;  ?></td>
	</tr>
	<tr>
		<td>Horario:</td>
		<td></td>
	</tr>
    <tr>
		<td>Rutina:</td>
		<td></td>
	</tr>
    <tr>
		<td>Nivel:</td>
		<td></td>
	</tr>
    <tr>
		<td>Observaciones:</td>
		<td></td>
	</tr>
    </table>
    </div>
    </div>

</div>
</body>
</html>
