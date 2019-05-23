<!DOCTYPE html> 

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Enviar Correos Electronicos</title> 
        <style type="text/css" rel="stylesheet"> 
            .error{ 
                color: red; 
            } 
        </style> 
    </head> 
    
    <body> 
        
        <?php 
        
    //incluir conexión a la base de datos 
    
    include '../../config/conexionBD.php'; 
    //include 'localhost/SistemaGestion/config/conexionBD.php';
    
    $fecha = isset($_POST["mensajeFecha"]) ? trim($_POST["mensajeFecha"]): null;
    $correo1 = isset($_POST["mensajeRemitente"]) ? trim($_POST["mensajeRemitente"]): null;
    $correo2 = isset($_POST["MensajeDestinatario"]) ? trim($_POST["MensajeDestinatario"]): null; 
    $asunto = isset($_POST["MensajeAsunto"]) ? $_POST["MensajeAsunto"] : null; 
    $mensaje = isset($_POST["MensajeMensaje"]) ? $_POST["MensajeMensaje"] : null; 
    $estado = isset($_POST["MensajeEstado"]) ? $_POST["MensajeEstado"] : null; 

    $sql = "INSERT INTO mensaje VALUES (0, '$fecha', '$correo1', '$correo2', '$asunto', '$mensaje', '$estado');"; 
        
    if ($conn->query($sql) === TRUE) { 
        
        echo "<p>MENSAJE ENVIADO!!!</p>"; 
    
    } else { 
        
     if($conn->errno == 1062){ 
            
        echo "<p class='error'>Los mensajes ya estan registrados en el sistema </p>"; 
    
    }else{

        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
        
        } 
      } 
      
      //cerrar la base de datos 
      
      $conn->close(); 
      echo "<a href='http://localhost/SistemaGestion/public/vista/mensajes.html'>Regresar</a>"; 
      
  ?> 
  
</body> 

</html>