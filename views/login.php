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
	<body id="login">
		<div id="wrapper">
			<h1><a href="index.html">Ingreso</a></h1>
			<form action="" method="post" name="loginform" id="loginform">
				<fieldset>
					<p>
					
					<label for="username">Nombre de Usuario<br />
					<input class="input" name="username" id="username" type="text" value=""/></label>
					</p>
					<br/>
					<label for="password">Contrase&ntilde;a: <br />
					<input class="input" type="password" id="password" name="password"/></label>
					<br/>
					<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Recu&eacute;rdame</label></p>
					<input class="button-primary" type="submit" value="Entrar"/>
				</fieldset>
			</form>
			<br />
			<div id="footer">
				<p>Desarrollado para</p>
				<div class="logos">
					<a href="http://www.inf.utfsm.cl/" alt="Lider en Ciencia y Tecnología" title="Lider en Ciencia y Tecnología" ><img src="public/img/di-logo.png" /></a>
					<a href="http://www.utfsm.cl/" alt="Lider en Ciencia y Tecnología" title="Lider en Ciencia y Tecnología" ><img src="public/img/utfsm-logo.png" /></a>
				</div>
			</div>
		</div>
    </body>
</html>