<?php 
session_start();
unset($_session['datos_login']);
header("Location: ../index.php");
?>