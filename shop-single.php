<?php
include("./php/conexion.php");
if( isset($_get['id'])){
   $resultado = $conexion ->query("select * from productos where id=".$_get['id'])or die($conexion->error);
   if(mysqli_num_rows($resultado) > 0){
      $fila =mysqli_fetch_row($resultado);
   }else{
    header("location: ./index.php");
   }
  }else{
  header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/<?php echo $fila[4]; ?> " alt="<?php echo $fila[1]; ?>Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">tecnologia y accesorios</h2>
            <p><?php echo $fila[2]; ?></p>
            
            <
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p><a href="cart.php?id=<?php echo $fila[0]; ?>" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/gettyimages-173607126-612x612.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Desktop</a></h3>
                    <p class="mb-0">buscando computador de escritorio?</p>
                    <p class="text-primary font-weight-bold">$349990</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/depositphotos_26429241-stock-photo-desktop-computer-with-touchscreen-interface.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Monitor</a></h3>
                    <p class="mb-0">Monitores</p>
                    <p class="text-primary font-weight-bold">$459990</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/IVLX7YP6TJBOJDVBRX5ZOUPBTY.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">notebooks</a></h3>
                    <p class="mb-0">tenemos notebooks</p>
                    <p class="text-primary font-weight-bold">$299990</p>
                  </div>
                </div>
              </div>
             
                  
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("./layouts/footer.php"); ?> 
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>