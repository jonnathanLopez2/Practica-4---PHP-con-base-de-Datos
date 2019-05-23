<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona </title>
    </head>
<body>
<?php
    
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
    $rol = isset($_POST["opcUsuarios"]) ? mb_strtoupper(trim($_POST["opcUsuarios"]), 'UTF-8') : null;
    $avatar = isset($_POST["avatar"]) ? trim($_POST["avatar"]) : null;

    
    if(strcmp($rol,"ADMIN")==0){
        $rol=1;
    } else if(strcmp($rol,"USER")==0){
        $rol=2;
    }
 
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    
    $sql = "UPDATE usuario " .
        "SET usu_cedula = '$cedula', " .
        "usu_nombres = '$nombres', " .
        "usu_apellidos = '$apellidos', " .
        "usu_direccion = '$direccion', " .
        "usu_telefono = '$telefono', " .
        "usu_correo = '$correo', " .
        "usu_fecha_nacimiento = '$fechaNacimiento', " .
        "usu_fecha_modificacion = '$fecha', " .
        "usu_rol = '$rol', " .
        "usu_avatar = '$avatar' " .
        "WHERE usu_codigo = '$codigo'";
 
    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
        echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
 $conn->close();

?>
</body>
</html>
