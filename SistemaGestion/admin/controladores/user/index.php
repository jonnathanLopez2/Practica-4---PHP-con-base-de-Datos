<!DOCTYPE html>
<html lang="">
  <head>

    <meta charset="UTF-8">
    <title> Mensajes Recibidos </title>
   
  </head>
    
  <body>



    <table style="width:100%">
        <tr>
            <td> 
                <a align="center" for="inicio" href="http://localhost/SistemaGestion/public_html/index.html">INICIO</a>
            </td>
            <td>
                <a align="center" for="nuevoMensaje" href="http://localhost/SistemaGestion/public/vista/mensajes.html">NUEVO MENSAJE</a>
            </td>
            <td>
                <a align="center" for="msgEnviados" href="">MENSAJES ENVIADOS</a>
            </td>
            <td>
                <a align="center" for="miCuenta" href="">MI CUENTA</a> 
            </td>    
            
          <td>
            <div align="center" class="card" style="width: 18rem;">
            <img class="card-img-top" src="../../../images/default-avatar.png">
            <div class="card-body">
            </div>
            <a align="center" for="Nombres Apellidos" href="http://localhost/SistemaGestion/public/vista/crear_usuario.html">NOMBRES APELLIDOS</a>
          </td>           
        </tr>
    </table>

    <table style="width:100%">
        <tr>
            <td>
                <h3> MENSAJES RECIBIDOS</h3>
                <input type="text" id="busqueda" name="busqueda" value="Busqueda por Remitente">
            </td>
        </tr>
    
        <tr>
            <td>
                <h3>Fecha</h3>
            </td>
            <td>
                <h3>Remitente</h3>
            </td>
            <td>
                <h3>Asunto</h3>
            </td>
            <td>
                <h3>Opcion</h3>
            </td>
         </tr>

        

<?php

include '../../../config/conexionBD.php';

    $sql="SELECT * FROM `mensaje`;";
    $result=$conn->query($sql);

    if($result->num_rows > 0){

        while($row=$result->fetch_assoc()){
            echo "<tr>";
                echo "<td>" .$row["MENSA_FECHA"]."</td>";
                echo "<td>" .$row['MENSA_REMITENTE']."</td>";
                echo "<td>" .$row['MENSA_ASUNTO']."</td>";                
                echo "<td> <a href='leerMensaje.php?id=" . $row['MENSA_ID'] . "'>LEER</a> </td>"; 
            echo "</tr>";
        }
    }else{
        echo "<tr>";
        echo "<td colspan='7'> No existen mensajes registrados en el sistema </td>";
        echo "</tr>";
    }

$conn->close();
?>

</table>
<br>
                <h1 align="center">Copyrigth</h1>
                <h1 align="center">Diego Parra</h1>
                <h1 align="center">2019</h1>
</body>
</html>

?>