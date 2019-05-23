<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>LEER MENSAJE</title>
    </head>
<body>
    <?php

    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM `mensaje` where usu_codigo=";

    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 ?>
 
    <form id="formulario01" method="POST" action="../../controladores/user/leerMensaje.php">
    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
    
    <label for="fecha">Fecha</label>
    <input type="date" id="MENSA_FECHA" name="MENSA_FECHA" value="<?php echo $row["MENSA_FECHA"]; ?>" disabled/>
    <br>
 
    <label for="remitente">Nombres (*)</label>
    <input type="text" id="MENSA_REMITENTE" name="MENSA_REMITENTE" value="<?php echo $row["MENSA_REMITENTE"]; ?>" disabled/>
    <br>
 
    <label for="asunto">Correo electrónico (*)</label>
    <input type="text" id="MENSA_ASUNTO" name="MENSA_ASUNTO" value="<?php echo $row["MENSA_ASUNTO"]; ?>" disabled/>
    <br>
 
</form>
 
<?php
    
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
    $conn->close();
 
?>
</body>
</html>