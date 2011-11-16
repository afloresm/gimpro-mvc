<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta name="keywords" content=""/>

<meta name="description" content=""/>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

<meta name="language" content="es"/>

<script>
    function agregar(id,nombre) {
      
        if(document.getElementById('nombre_usuario').getData==''){
            $('#nombre_usuario').hide()
        }
          if(id=='hola'){
            $('#celda').hide();
        }  else{ $('#celda').show();
          }
        $('#nombre_usuario').empty();
        $('#nombre_usuario').append(nombre);
    }

    $(document).ready(function() {
          $('.enviar').click(function() {
              //var id = $(this).attr('id');

              var max = $("#maximal").val();
              var carga = $("#carga").val();
              var peso = $("#peso").val();
              var repeticion = $("#repeticion").val();
              var series = $("#series").val();

             // alert(max  + carga + peso + repeticiones + series);


              var dataString ='maximal='+max+'&carga='+carga+'&peso='+peso+'&repeticiones='+repeticion+'&series='+series;
               
                $.ajax({
                    type: "POST",
                    url: "?controlador=Ejercicios&accion=GuardarCicloEjercicio",
                    data: dataString,
                    success: function(data) {
                         alert('se agregaron correctamente los datos');
                        
                    }

                });
          });


      });


</script>
<head>
    <br>
<h2>Ejercicio</h2>
<select id="lista_ejercicios">
    <option onclick="agregar(this.value,this.id)" id="hola" value="hola" selected>Seleccionar ejercicio </option>
<?php

    while ($row = $listado->fetch()) {
    echo'<option onclick = agregar(this.value,this.id) id ="'.$row['nombre'].'"  value="'.$row['id_ejercicio'].'">'.$row['nombre'].' </option>';

}

?>
    </Select>
<br>
<div id="celda">
   <table border="1">
    <tr>
        <th>Ejercicio</th>
        <th>Max</th>
        <th>Carga</th>
        <th>Peso</th>
        <th>Rept.</th>
        <th>Series</th>
    </tr>
       <br>
     <tr>
         <?php echo'<td id="nombre_usuario"></td>';  ?>
        <td> <input type="text" size="3" id="maximal"</td>
        <td> <input type="text" size="3" id="carga"</td>
        <td> <input type="text" size="3" id="peso"</td>
        <td> <input type="text" size="3" id="repeticion"</td>
        <td> <input type="text" size="3" id="series"</td>
        <td> <input type="button" class="enviar" value="agregar"></td></tr>
  </table>
       </div>

</html>
