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

function loadVideo() {

           var xmlhttp;
           if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
               xmlhttp = new XMLHttpRequest();
           }
           else {// code for IE6, IE5
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
           }

           xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  alert(xmlhttp.responseText);

                  // document.getElementById("link2").innerHTML = xmlhttp.responseText;
               }
           }

           xmlhttp.open("POST", "?controlador=Alumno&accion=actualizar_datos", true);
           xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           xmlhttp.send();
       }



</script>

</head>

<body>

<div class="container">
	
    <ul class="tabs">
        <li><a href="#tab1">Datos personales</a></li>
        <li><a href="#tab2">Datos acad&eacute;micos</a></li>
        <li><a href="#tab3">Datos cuenta</a></li>
    </ul>

    <div class="tab_container">

        <div id="tab1" class="tab_content">

    <form onsubmit="loadVideo()" name="Datos Personales" method="post" autocomplete= "off" ">
    <td><input name="id" type = "hidden" value="<?php echo $id_user; ?>"></td>
    <table>
    <tr>
		<td>Nombre:</td>
		<td><input type="text" name="nombres" id="nombres" value="<?php echo $nombres; ?>"></td>
	</tr>
	<tr>
		<td>Apellidos:</td>
		<td><input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>"</td>
	</tr>
	<?php
	$temp = explode("-",$fecha_nacimiento);
    ?>
	<tr>
		<td>Fecha de nacimiento:</td>
		<td><input type="number" name="dia" id="dia" size="2" maxlength="2" pattern="[0-9]{2}" value="<?php echo $temp[2]; ?>" />/<input id="mes" type="number" name="mes" size="2" maxlength="2" pattern="[0-9]{2}" value="<?php echo $temp[1]; ?>"/>/<input id="anio" type="number" name="anio" size="4" maxlength="4" pattern="[0-9]{4}" value="<?php echo $temp[0]; ?>"/></td>
	</tr>
	<tr>
		<td>Rut:</td>
		<td><input id="rut" name="rut" type = "text" size="10" maxlength="10" pattern="[0-9]{8}[-]{1}[Kk0-9]{1}" value="<?php echo $rut; ?>"></td>
	</tr>
	<tr>
		<td>Ciudad:</td>
		<td><input id="ciudad" name="ciudad" type = "text" size="30" value="<?php echo $ciudad; ?>"></td>
	</tr>
	<tr>
		<td>Celular:</td>
		<td><input id="celular" name="celular" type = "tel" pattern="[0-9]{2}[-]{1}[0-9]{8}" size="10" value="<?php echo $celular; ?>"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input id="email" name="email" type = "email" pattern=".+\@.+\..+" size="30" value="<?php echo $email; ?>"></td>
	</tr>
	<tr>
		<td><input type="reset" value="Restablecer"></td>
		<td></td>
		<td><input type="submit" value="Enviar"></td>
	</tr>
    </table>
    </form>

    </div>

    <div id="tab2" class="tab_content">
            <form action="#" name="Datos académicos" method="post" autocomplete= "off" ">
    <table>
    <tr>
		<td>Carrera:</td>
		<td><input id="carrera" name="carrera" type = "text" size="30" value="<?php echo $carrera; ?>"></td>
	</tr>
	<tr>
		<td>Rol:</td>
		<td><input id="rol" name="rol" type = "text" pattern="[0-9]{7}[-]{1}[0-9]{1}" size="10" value="<?php echo $rol; ?>"></td>
	</tr>
	<tr>
		<td><input type="reset" value="Restablecer"></td>
		<td></td>
		<td><input type="submit" value="Enviar"></td>
	</tr>
    </table>
    </form>

        </div>

        <div id="tab3" class="tab_content">
    <form action="#" name="Datos cuenta" method="post" autocomplete= "off" ">
    <table>
    <tr>
		<td>Username:</td>
		<td><input id="user" name="user" type = "text" size="30" value="<?php echo $username; ?>"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input id="pass" name="pass" type = "password" size="30" value="<?php echo $password; ?>"></td>
	</tr>
	<tr>
		<td><input type="reset" value="Restablecer"></td>
		<td></td>
		<td><input type="submit" value="Enviar"></td>
	</tr>
    </table>
    </form>

    </div>
    </div>

</div>
<
</body>
</html>
