<!DOCTYPE html>
<html lang="">
  <head>

    <meta charset="UTF-8">
    <title> Gestion de Usuarios </title>
   
  </head>
    
  <body>

    <table style="width:100%">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
</tr>

    <?php

    include '../../../config/conexionBD.php';
    $sql="SELECT * FROM usuario";
    $result=$conn->query($sql);

    if($result->num_rows > 0){

        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" .$row['USU_CEDULA']. "</td>";
            echo "<td>" .$row['USU_NOMBRES']. "</td>";
            echo "<td>" .$row['USU_APELLIDOS']. "</td>";
            echo "<td>" .$row['USU_DIRECCION']. "</td>";
            echo "<td>" .$row['USU_TELEFONO']. "</td>";
            echo "<td>" .$row['USU_CORREO']. "</td>";
            echo "<td>" .$row['USU_FECHA_NACIMIENTO']. "</td>";
            echo " <td> <a href='eliminar.php?codigo=" . $row['USU_CODIGO'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar.php?codigo=" . $row['USU_CODIGO'] . "'>Modificar</a> </td>";
            echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['USU_CODIGO'] . "'>Cambiar contraseña</a> </td>"; 
            echo "</tr>";
        }
    }else{
        echo "<tr>";
        echo "<td colspan='7'> No existen usuarios registrados en el sistema </td>";
        echo "</tr>";
    }

$conn->close();
?>

</table>

</body>
</html>
