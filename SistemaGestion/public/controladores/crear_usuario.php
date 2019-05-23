<!DOCTYPE html> 

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Crear Nuevo Usuario</title> 
        <style type="text/css" rel="stylesheet"> 
            .error{ 
                color: red; 
            } 
        </style> 
    </head> 
    
    <body> 
        
        <?php 
        
    
    include '../../config/conexionBD.php'; 
    
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null; 
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null; 
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null; 
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null; 
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null; 
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
    $rol = isset($_POST["opcUsuarios"]) ? mb_strtoupper(trim($_POST["opcUsuarios"]), 'UTF-8') : null;
    //$avatar = isset($_FILES['file']['name']) : null;


    echo "llego: ".$rol;
    echo "llego: ".$correo;
    if(strcmp($rol,"ADMIN")==0){
        $rol=1;
    } else if(strcmp($rol,"USER")==0){
        $rol=2;
    }

    if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$_FILES['file']['name'])) {
        echo "images/".$_FILES['file']['name'];
        $image = $_FILES['file']['name'];
        $avatar = addslashes(file_get_contents($image));
    } else {
        echo 0;
    }
} else {
    echo 0;
}

    $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', 
        MD5('$contrasena'), '$fechaNacimiento', 'N', null, null, '$rol', '$avatar');"; 
        
        
    if ($conn->query($sql) === TRUE) { 
        
        echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 
    
    } else { 
        
     if($conn->errno == 1062){ 
            
        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; 
    
    }else{

        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
        
        } 
      } 
      
      //cerrar la base de datos 
      
      $conn->close(); 
      echo "<a href='../vista/crear_usuario.html'>Regresar</a>"; 
      
  ?> 
  
</body> 

</html>