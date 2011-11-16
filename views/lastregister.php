
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
                        
                        while ($item = $last->fetch())
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