<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');


// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$datos=array();
for($x=0;$x<10;$x++){


$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75;
$datos[]=$item;
}
$preference->items = array($datos);
$preference->save();


Curl -X POST \ "Content-Type:application/json" \
"http://api.mercadopago.com/users/test_user?access_token=PROD_ACCESS_TOKEN" \
-d "('site_id':'MLM')"
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css">
    <title>Bootstrap demo</title>
  </head>
  <body>
  // SDK MercadoPago.js
<script src="https://sdk.mercadopago.com/js/v2"></script>

<div id="wallet_container"></div>
  </body>
</html>