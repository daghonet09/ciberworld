<?php 
session_star();
if(isset($_session['carrito'])){
  // si existe buscamos si ya estaba  agregado ese producto
  if(isset($_GET['id'])){
    $arreglo =$_session['carrito'];
    $encontro=false;
    $numero=0;
    for($i=0;$i<count($arreglo);$i++){
      if($arreglo[$i]['Id']==$_GET['id']){
        $encontro=true;
        $numero=$i;
      }
    }
    if($encontro==true){
      $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
      $_session['carrito']=$arreglo;
    }else{
      //no estaba el registro
      if(isset($_GET['id'])){
        $nombre ="";
        $precio ="";
        $imagen ="";
        $res= $conexion->query('select * from productos where id='.$_GET['id'])or die($conexion->error);
        $fila = mysqli_fetch_row($res);
        $nombre=$fila[1];
        $precio=$fila[3];
        $imagen=$fila[4];
        $arreglonuevo=array{
          'Id'=> $_Get['id'],
          'Nombre'=>$nombre,
          'Precio'=>$precio,
          'Imagen'=>$imagen,
          'Cantidad' => 1
        };
        array_push($arreglo, $arreglonuevo);
        $_session['carrito']=$arreglo;
    }
  }
}else{
  //creamos la variable de sesion
  if(isset($_GET['id'])){
    $nombre ="";
    $precio ="";
    $imagen ="";
    $res= $conexion->query('select * from productos where id='.$_GET['id'])or die($conexion->error);
    $fila = mysqli_fetch_row($res);
    $nombre=$fila[1];
    $precio=$fila[3];
    $imagen=$fila[4];
    $arreglo[]=array{
      'Id'=> $_Get['id'],
      'Nombre'=>$nombre,
      'Precio'=>$precio,
      'Imagen'=>$imagen,
      'Cantidad' => 1
    };
    $_session['carrito']=$arreglo;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ciberworld </title>
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
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $total=0;
                if(isset($_session['carrito'])){
                  $arregloCarrito =$_session['carrito'];
                  for($i=0;$i<count($arregloCarrito);$i++){
                    $total= $total +($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
                    
                    If($_POST ){
                      $total= $i;
                      
                      $desc=0;
                      If($total>=100000){
                      $desc=$total*/0.20;
                      }else{
                      $desc=$total*1;
                      }
                       
                 }
                ?>

                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/<?php echo $arregloCarrito[$i]['Imagen'] ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre'] ?></h2>
                    </td>
                    <td>$<?php echo $arregloCarrito[$i]['Precio'] ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="<?php echo $arregloCarrito[$i]['Cantidad'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td>$<?php echo $arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad'] ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
                  <?php }} ?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total; ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total; ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
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