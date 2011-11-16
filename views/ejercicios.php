<div id="content">
        <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

     <script>

         $(document).ready(function() {

      $('#lista_ejercicios option').click(function(){
      var video = $(this).attr('value');
          video = "#"+video;
          $(video).slideToggle();
          return false;
    });

      $('#lista_ejercicios option').change(function(){
        var display = $(this).attr('id');
          alert(display);
       //  display.css(display,'none');
          return false;
      });



   });

         function actualizar(){

             var xmlrequest

             if (window.XMLHttpRequest)
             {
                 xmlrequest = new XMLHttpRequest();
             }

             if (xmlrequest.readyState == 4 && xmlrequest.status == 200){
                 //lo que se hace reciba
             }
         }
</script>
			 <h2>Ejercicios</h2>
  
  <div class="post">

    <div class="entry">

							<?php
                            echo '<select id="lista_ejercicios">';
                        while ($item = $listado->fetch())
                            {
                                
                                echo "<option value='".$item['video']."'>".$item['nombre']."</option>";


							}
                            echo "</select>";



                            ?>
							
	        <div id="link2" style="display:none;" >

                    PRUEBA
                    <object width="420" height="315"><param name="movie" value="http://www.youtube.com/v/OEI-LdU8YkU?version=3&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/OEI-LdU8YkU?version=3&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>
            </div>
					
                    </div>

                </div>
            </div>