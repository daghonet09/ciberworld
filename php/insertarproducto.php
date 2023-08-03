<?php 
include "./conexion.php";
if(isset($_POST['nombre'])  && isset($_POST['descripcion']) && isset($_POST['precio'])
&&  isset($_POST['inventario']) && isset($_POST['categoria']) && isset($_POST['color'])){

    $carpeta="../images/";
    $nombre=$_FILES['imagen']['name'];
    $temp=explode('.',$nombre);
    $extension=end($temp);
    $nombrefinal=time().'.',$extension;
    if($extension=='jpg' || $extension== 'png'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombrefinal)){
           $conexion->query("inser into productos(nombre,descripcion,imagen,precio,color,id_categoria,inventario)values
           (
            '".$_POST['nombre']."',
            '".$_POST['descripcion']."',
            '$nombrefinal',
            ".$_POST['precio'].",
            '".$_POST['color']."',
            '".$_POST['categoria']."',
            '".$_POST['inventario']."'
           )")or die($conexion->error);
           header("Location: ../admin/productos.php?success");
        }else{
            header("Location: ../admin/productos.php?error=no se pudo subir la imagen");
        }
    }else{
        header("Location: ../admin/productos.php?error=Favor de subir una imagen valida");
    }

}else{
    header("Location: ../admin/productos.php?error=Favor de llenar todos los campos");
}
?>