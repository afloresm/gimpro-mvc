
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns="">

<head>

    <?php
           header ('Content-type: text/html; charset=utf-8');
           $titulo=$estructura['titulo'];
           $controlador = $estructura['controlador'];
           //$id= $estructura['id'];

    ?>

    <title>Gimnasio III: <?php echo $titulo ?></title>

    <meta name="keywords" content="" />

    <meta name="description" content="" />

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <meta name="language" content="es" />

    <link href="public/css/perfil.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

    <script>

        $(document).ready(function() {
         var controlador = '<?php echo $controlador ?>';

    $('#sidebar li').click(function(){

        var toLoad = $(this).attr('id');
        var toLoad = "?controlador=" + controlador + "&accion="+toLoad;
    //    alert (toLoad);
        
    $('#content').hide('fast',loadContent);
    $('#load').remove();
    //$('#wrapper').append('<span id="load">LOADING...</span>');
    $('#load').fadeIn('normal');
   // window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
    function loadContent() {
        $('#content').load(toLoad,'',showNewContent())
    }
    function showNewContent() {
        $('#content').show('slow',hideLoader());
    }
    function hideLoader() {
        $('#load').fadeOut('normal');
    }
    return false;
});


});


    </script>

    <!-- Especificamos los script: JQUERY y el controlador del menu: menu_profesor.js -->
    <!--	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script> -->
    <!--	<script type="text/javascript" src="menu_profesor.js"></script> -->
    <!-- <script type="text/javascript" src="js/jquery.url.min.js"></script> -->
    <!-- <script type="text/javascript" src="ajax.js"></script> -->

</head>

<body>


	
    <div id="header">
		<!-- imagen cabecera del GYM -->
        <div id=image1></div>
		
		

    </div><!-- header -->

    <div id="main"><div id="main2">	

	<!-- nuestro menu principal... fijarse que es sidebar y dentro de este va el li con el id que registra la accion a realizar-->
            <div id="sidebar">

                <h2>Menu Principal</h2>

                <ul>


                    <?php

                    foreach ($menu_visual as $item)
                    {

                        $over="this.className='on'";
                        $out="this.className='off'";
                        echo "<li class='off' id='".$function[$item]."'".' onmouseover="'.$over.'" onmouseout="'.$out.'">'.$item."</li>";
                    }
                    ?>

                </ul>

				
				<!-- esto (div id="box" )es el otro tipo de menu que trae el css hasta el momento no lo usamos-->
      <!--           <h2>Integer rhoncus</h2>

                <div class="box">

                    <p>div con class BOX</p>

                </div>

                <h2>Mauris sagittis</h2> -->
                
            </div> 
            <!-- sidebar -->    	              

<!-- Seccion o Cuerpo principal: �ste ser�a el por defecto al cargar la pagina. -->
           
<div id="content">

				<fieldset><legend style="text-align:right"><h2>Ultimos Registrados </h2></legend>              
  
  <div class="post">

                   <!--  p con class postmeta -> css  <p class="postmeta">Posted in <a href="#">Class apent</a> | Apr 18, 2011 | <a href="#">4 comments</a></p> -->

    <div class="entry">
                    
                    <?php
               /**
                    header ('Content-type: text/html; charset=iso-8859-1');
                    //ToDo: verificar que sea un profesor. agregar links con perfil de usuario. 
                     include_once('includes/header.php');
					 $array = array();
					 
					 $array = new Usuarios();
					 $last= array();
					 $last=$array->getLastRegister();
				*/
        
        
					 
					?>
                    <table border = 0.5 style="text-align: center">
							<tr> <th>Nombre Alumno </th> <th>Nota Encuesta</th> <th>Habilitado</th> <th>Fecha Registro</th> </tr>
							<?php

                        while ($item = $welcome->fetch())
                            { echo "<tr><td><a href='perfil.php?id=".$item['id_user']." title='Ver Perfil''>".$item['nombres']." ".$item['apellidos']."</a></td>";
							  echo "<td><a href='result_encuesta.php?id=".$item['id_user']." title='Ver Perfil''>".$item['nota_encuesta']."</a></td>";
							//  if($item->isHabilitado())
						//	  echo "<td>".$item->getPerfil()."</td>";
							//  else
							  echo "<td><a href='link para cuadro de habilitacion' title='Click para Habilitar'>No</a></td>";
							  echo "<td>".$item['fecha_inicio']."</td></tr>";

							}

                     /**
                     foreach ($last as $ultimo)
							{ echo "<tr><td><a href='perfil.php?id=".$ultimo->getIDUser()."&flag=1 title='Ver Perfil''>".$ultimo->getNombres()." ".$ultimo->getApellidos()."</a></td>";
							  echo "<td><a href='result_encuesta.php?id=".$ultimo->getIDUser()." title='Ver Perfil''>".$ultimo->getNota_encuesta()."</a></td>";
							//  if($ultimo->isHabilitado())
						//	  echo "<td>".$ultimo->getPerfil()."</td>";
							//  else
							  echo "<td><a href='link para cuadro de habilitacion' title='Click para Habilitar'>No</a></td>";
							  echo "<td>".$ultimo->getFecha_inicio()."</td></tr>";

							}
                      */?>
							
					</table>
				
					
                    </div>

                </div>

<!--
                <div class="post">

                    <h2><a href="#">Lorem ipsum dolor sit amet</a></h2>

                    <p class="postmeta">Posted in <a href="#">Lorem ipsum</a> | Apr 15, 2010 | <a href="#">2 comments</a></p>

                    <div class="entry">

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec dui quis urna sollicitudin sodales. Fusce laoreet, ligula et rhoncus volutpat, felis magna varius tortor, ac molestie diam lorem in lectus. Aliquam venenatis mollis est, a porttitor ipsum interdum nec. Vestibulum sed risus ac nulla viverra pharetra.</p>

                        <p>Quisque congue lacus sed odio fermentum tincidunt. Proin vitae nulla velit. Cras consectetur commodo scelerisque. Curabitur leo nisl, blandit at tempus et, interdum at risus. Sed dui augue, pellentesque ac pulvinar id, malesuada eget diam. Integer elementum sem eget tortor faucibus id pellentesque lorem dignissim... <a href="#">more</a></p>

                    </div>

                </div>				              
<!-- content -->
</fieldset>
            </div>                    

<!-- fin del content -->                    
                	
            <div class="clearing">&nbsp;</div>   

    </div> </div><!-- main --><!-- main2 -->

    <div id="footer">

        <p>Copyright &copy; 2011, designed by <a href="http://www.webtemplateocean.com/">WebTemplateOcean.com</a></p>

    </div>

<div style="text-align: center; font-size: 0.75em;">Design downloaded from <a href="http://www.freewebtemplates.com/">free website templates</a>.</div></body>

</html>