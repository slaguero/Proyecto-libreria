<?php

include 'conexion_de.php';

$user = $_POST['user'];
$contra= $_POST['contra'];


//verificar datos
$validar_login = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$user'
        and contrasena = '$contra'"); 

if(mysqli_num_rows($validar_login)>0){
    
    header("location:../home.html");
}else{
    echo '
        <script>
       alert("Usuario o contraseña incorrecto, intente otra vez");
       window.location ="../loging.html";
    </script>'
    ;
}

?>