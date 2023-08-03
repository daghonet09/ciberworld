<?php
$servidor="localhost";
$nombrebd="carrito";
$usuario="root";
$pass="";
$conexion = new mysql($servidor,$usuario,$pass,$nombrebd);
if($conexion -> connect_error ){
    die("no se puede conectar");
}
?>