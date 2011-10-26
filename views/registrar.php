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
<body id="registrar">
<div id="wrapper">
    <h1><a href="registrar.php">Registro</a></h1>

    <form action="?controlador=Registrar&accion=guardar" method="post" name="loginform" id="loginform">
        <fieldset>

           <label><h2> Datos personales:</h2></label>
            <br/>
            <p>

                <label>Nombres:
                <input class="registar" name="nombres" id="nombres" type="text" placeholder="Nombres" size="30" autofocus/></label>
            </p>


                <label>Apellidos:
                <input class="registar" name="ape" id="ape" type="text" placeholder="paterno/materno" size="30"/></label>

                 <br/>
           	    <label>G&eacute;nero:
		        Masculino <input name="gen" type = "radio" value="Masculino" requiered >
				Femenino <input name="gen"  type = "radio" value="Femenino" requiered ></label>

              <br/><br/>
                <label>Fecha de Nacimiento:</label>
              <label><input id="dia" name="dia" type="number" size="2" maxlength="2"  placeholder="01" pattern="[0-9]{2}"/> </label>
             <label>/<input id="mes" type="number" name="mes" size="2" maxlength="2" placeholder="01" pattern="[0-9]{2}"/></label>
            <label> /<input id="anio" type="number" name="anio" size="4" maxlength="4" placeholder="1990" pattern="[0-9]{4}"/></label>

            <br/><br/>

            <label>Rut:
            <input id="rut" name="rut" type = "text" placeholder="16100200-0" size="10" maxlength="10" pattern="[0-9]{8}[-]{1}[Kk0-9]{1}"></label>

              <br/><br/>
             <label>Rol:
             <input id="rol" name="rol" type = "text" pattern="[0-9]{7}[-]{1}[0-9]{1}" placeholder="2730000-1" size="10"></label>

             <br/><br/>
             <label>Carrera:
             <input class="registar" id="carrera" name="carrera" type = "text" placeholder="Carrera/profesi&oacute;n" size="30"></label>

             <br/>
             <label>Ciudad:
             <input class="registar" id="ciudad" name="ciudad" type = "text" placeholder="Ciudad de residencia" size="30"> </label>

             <br/>
             <label>Celular:
             <input id="celular" name="celular" type = "tel" pattern="[0-9]{2}[-]{1}[0-9]{8}" placeholder="09-81234567" size="10"></label>

              <br/><br/>
             <label>Email:
             <input  class="registar" id="email" name="email" type = "email" pattern=".+\@.+\..+" placeholder="E-mail de contacto"  size="30"></label>

              <br/>
              <label> <h2> Datos f&iacute;sicos:</h2></label>

                 <br/>
                 <label>Altura [Metros]:
                 <input id="altura" name="altura" type = "text" placeholder="1.60" pattern="[1-9]{1}[.]{0,1}[0-9]{0,2}" size="5"></label>

               <br/><br/>
                   <label>Peso [Kilogramos]:
                   <input id="peso" name="peso" type = "text" placeholder="70" size="5" pattern="[1-9]{1,3}[.]{0,1}[0-9]{0,2}"></label>

               <br/><br/>

                <label><h2>Datos de la cuenta:</h2></label>

               <br/>
                <label>Usuario:
				<input class="registar" id="user" name="user" type = "text" placeholder="Nombre de usuario"  size="30"></label>

               <br/>
		       <label>Password:
			   <input class="registar" id="pass" name="pass" type = "password" placeholder="Ingrese password"  size="30"></label>

            
            <input class="button-primary" id="login-submit" type="submit" value="Registrar"/>
        </fieldset>
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