

<?php

include 'conexion_de.php';

$nombre_completo= $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$query= "INSERT INTO usuarios(nombre, correo, usuario,contrasena) 
     Values('$nombre_completo','$correo','$usuario','$contrasena')";
//Verificar que correo no se repita en la BD
$verificar = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");
if(mysqli_num_rows($verificar) > 0){
    echo '
        <script>
       alert("Correo ya registrado, intente con otro");
       window.location ="../loging.html";
    </script>'
    ;
    exit();
    
}
//verificar usuario que no se repita

$verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script>
       alert("Usuario ya registrado, intente con otro");
       window.location ="../loging.html";
    </script>'
    ;
    exit();
    
}

$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
    echo ' 
        <script>
        alert("Usuario Registrado Exitosamente");
        window.location ="../loging.html";
    </script> '
   ;
    
}else{
    echo ' 
        <script>
        alert("Usuario no Registrado, Intentelo nuevamente");
        window.location ="../loging.html";
    </script> '
    ;
}

mysqly_close($conexion);
?>