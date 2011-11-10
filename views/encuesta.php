<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gimnasio III - Defider UTFSM</title>

    <link rel="stylesheet" href="public/css/reset.css" type="text/css">
    <link rel="stylesheet" href="public/css/login.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="public/js/jquery.imghover-1.1rc.js"></script>

    <script>
        $(window).load(function() {
            $('#wrapper').fadeIn(2300);
            $('div.logos').imghover({suffix: '-hovered' , fade: 'true' , fadeSpeed: 500});
        });
    </script>
    
</head>
<body id="encuesta">
<div id="wrapper">
    <h1><a href="encuesta.php">Encuesta</a></h1>

    <form action="?controlador=Encuesta&accion=guardar" method="post" name="registro" id="encuestaform">

   <td><input name="id" type = "hidden" value="<?php echo $respuesta; ?>"></td>
       <p>
	   <h3>Alimentación </h3>

	   <table>
	   <td><b>Tu desayuno, regularmente es:</b></td>
			<tr>
				<td> <input name="desayuno" value=0 type = "radio" required>No tomo desayuno.</td>
			</tr>
			<tr>
				<td> <input name="desayuno" value=1 type = "radio" required>Solo tomo Líquidos (Leche,Café,Té,Jugo). </td>
			</tr>
			<tr>
				<td><input name="desayuno" value=2 type = "radio" required>Tomo Líquidos y Consumo Cereales, Pan. </td>
			</tr>
			<tr>
				<td><input name="desayuno" value=3 type = "radio" required>Consumo Cereales, Lácteos y Frutas.</td>
			</tr>

            <td><b>Tu almuerzo, regularmente es:</b></td>
			<tr>
				<td><input name="almuerzo" value=0 type = "radio" required>No Almuerzo. </td>
			</tr>
			<tr>
				<td><input name="almuerzo" value=1 type = "radio" required>Comida Rápida (Completo,Empanadas,Pizzas).</td>
			</tr>
			<tr>
				<td><input name="almuerzo" value=2 type = "radio" required>Soy Vegetariano. </td>
			</tr>
			<tr>
				<td><input name="almuerzo" value=3 type = "radio" required>Balanceado (comida casera, almuerzo de la U).</td>
			</tr>

		    <td><b>Tu consumo de agua "de la llave", regularmente es:</b> </td>
			<tr>
				<td><input name="agua" value=0 type = "radio" required>No tomo agua, solo bebidas y jugos.</td>
			</tr>
			<tr>
				<td><input name="agua" value=1 type = "radio" required>1 Litro.</td>
			</tr>
			<tr>
				<td><input name="agua" value=2 type = "radio" required>2 Litros.</td>
			</tr>
			<tr>
				<td><input name="agua" value=3 type = "radio" required>3 Litros o más.</td>
			</tr>

		    <td><b>¿Consumes Tabaco?</b></td>
			<tr>
			<td><input name="tabaco" value="si" type = "radio"  onclick="document.registro.tabacoCantidad.disabled=!document.registro.tabacoCantidad.disabled">Sí.

			Ingresa la cantidad de cigarrillos que consume a la semana:</td>
		    <td><input class="registar" name="tabacoCantidad" id="tabacoCantidad" type = "text" required disabled> </td>
			<tr><td><input name="tabaco" value="no" type = "radio">No.
         	</td></tr>
			</tr>

		    <td><b>¿Consumes Alcohol?</b></td>
		    <tr>
			<td><input name="alcohol" value="si" type = "radio"  onclick="document.registro.alcoholCantidad.disabled=!document.registro.alcoholCantidad.disabled">Sí.

		    Ingresa la cantidad de alcohol (vasos estimados) que consume a la semana:</td>
			<td><input class="registar" name="alcoholCantidad" id="alcoholCantidad" type = "text" required disabled></td>
			<tr><td><input name="alcohol" value="no" type = "radio">No.
			</td></tr>
		    </tr>

		    <td><b>¿Consumes Drogas?</b></td>
	    	<tr>
			<td><input name="drogas" value="si" type = "radio"  onclick="document.registro.drogasCantidad.disabled=!document.registro.drogasCantidad.disabled">Sí.

            Ingresa la cantidad de veces que consume drogas a la semana:</td>
			<td><input class="registar" name="drogasCantidad" id="drogasCantidad" type = "text" required disabled></td>
			<tr><td><input name="drogas" value="no" type = "radio" >No.
			</td></tr>
		    </tr>
	</table>

		<h3>Enfermedades</h3>
	<table>
		<b>Selecciona la zona afectada y en el cuadro de texto específica el nombre de la enfermedad:</b>
			<tr>
				<td><input name="cardiaca" id="cardiaca" value="si" type = "checkbox" onclick="document.registro.ecardiaca.disabled=!document.registro.ecardiaca.disabled">Cardíaca:</td>
				<td><input name="ecardiaca" id="ecardiaca" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="hepatica" id="hepatica" value="si" type = "checkbox" onclick="document.registro.ehepatica.disabled=!document.registro.ehepatica.disabled">Hepática:</td>
				<td><input name="ehepatica" id="ehepatica" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="sexual" id="sexual" value="si" type = "checkbox" onclick="document.registro.esexual.disabled=!document.registro.esexual.disabled">Sexual:</td>
				<td><input name="esexual" id="esexual" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="respiratoria" id="respiratoria" value="si" type = "checkbox" onclick="document.registro.erespiratoria.disabled=!document.registro.erespiratoria.disabled">Respiratoria:</td>
				<td><input name="erespiratoria" id="erespiratoria" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="otrae" value="si" type = "checkbox"  onclick="document.registro.eotra.disabled=!document.registro.eotra.disabled">Otra:</td>
				<td><input class="registar" name="eotra" id="eotra" type = "text" required disabled></td>
			</tr>
            <tr>
				<td><input name="noenfermedad" value="no" type = "checkbox"">No sufro de enfermedades</td>
			</tr>

        
	</table>
		  <h3>Lesiones</h3>
	<table>
		<tr><b>Selecciona la zona afectada y en el cuadro de texto específica el nombre de la lesión. Menciona la lesión incluso si ya te mejoraste</b></tr>
			<tr>
				<td><input name="brazos" id="brazos" value="si" type = "checkbox" onclick="document.registro.lbrazos.disabled=!document.registro.lbrazos.disabled">Brazos:</td>
				<td><input class="registar" name="lbrazos" id="lbrazos" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="piernas" id="piernas" value="si" type = "checkbox" onclick="document.registro.lpiernas.disabled=!document.registro.lpiernas.disabled">Piernas:</td>
				<td><input class="registar" name="lpiernas" id="lpiernas" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="torax" id="torax" value="si" type = "checkbox" onclick="document.registro.ltorax.disabled=!document.registro.ltorax.disabled">Tórax: </td>
				<td><input class="registar" name="ltorax" id="ltorax" type = "text" required disabled></td>
			</tr>
			<tr>
				<td><input name="otral" id="otra" value="si" type = "checkbox"  onclick="document.registro.lotra.disabled=!document.registro.lotra.disabled">Otra Zona:</td>
				<td><input class="registar" name="lotra" id="lotra" type = "text" required disabled></td>
			</tr>
            <tr>
				<td><input name="nolesiones" value="no" type = "checkbox"">No sufro de lesiones</td>
			</tr>
        
	</table>
		  <h3>Medicamentos</h3>
	<table>
	<th><b>¿Consumes medicamentos?. En caso afirmativo, mencionalo en el cuadro de texto. Si es más de uno, separalos por una coma (,)</b></th>
		<tr>
			<td><input name="medica" value="si" type = "radio" onclick="document.registro.nombreMedica.disabled=!document.registro.nombreMedica.disabled">Sí:
			<input class="registar" name="nombreMedica" id="nombreMedica" type = "text" required disabled></td>
		<tr>
			<td><input name="medica" value="no" type = "radio">No.</td>
		</tr>
		</tr>
	</table>
		 <h3>Autoestima</h3>
	<table>
		<tr>
			<td><b>Actualmente consideras tu autoestima como:</b> </td>
		</tr>
		<tr>
			<td><input name="autoestima" value=0 type = "radio" required>Alta.</td>
		</tr>
		<tr>
			<td><input name="autoestima" value=1 type = "radio" required>Normal. </td>
		</tr>
		<tr>
			<td><input name="autoestima" value=2 type = "radio" required>Baja. </td>
		</tr>
	</table>
	<h3>Actividad Física</h3>
	<table>
		<tr>
			<td><b>Semanalmente ¿prácticas alguna actividad física?. Indica la cantidad de días que realizas éstas actividades:</b></td>
		</tr>
		<tr>
			<td><input name="actFisica" value=0 type = "radio" required>No realizo Actividades Físicas.</td></tr>
		<tr>
			<td><input name="actFisica" value=1 type = "radio" required>1 a 3 Días.</td>
		</tr>
		<tr>
			<td><input name="actFisica" value=2 type = "radio" required>4 a 5 Días.</td>
		</tr>
		<tr>
			<td><input name="actFisica" value=3 type = "radio" required>Todos los Días. </td>
		</tr>
		<tr>
			<td></td>
			<td><input class="button-primary" id="encuesta-submit" type="submit" value="Completar registro"/>
		</tr>
        </table>
        </form>
    <br/>

    <div id="footer">
        <p>Desarrollado para</p>

        <div class="logos">
            <a href="http://www.inf.utfsm.cl/" alt="Lider en Ciencia y Tecnología"
               title="Lider en Ciencia y Tecnología"><img src="public/img/di-logo.png"/></a>
            <a href="http://www.utfsm.cl/" alt="Lider en Ciencia y Tecnología"
               title="Lider en Ciencia y Tecnología"><img src="public/img/utfsm-logo.png"/></a>
        </div>
    </div>
</div>
</body>
</html>