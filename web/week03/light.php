<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="week3.js"></script>
  <title>Browse Items</title>
</head>

<body>
  <h1>Checkout Page</h1>
  <?php
include 'navbar.php';
include 'products.php';
$allProducts = unserialize($_SESSION["allProducts"]);

foreach($allProducts[0] as $key => $value) {
    echo "$value";
    echo "There had better be something above me";
}
?>
  <div class="container">
        <div class="row">
        <div class="col-sm-6 d-flex justify-content-center">
        <div class="card" style="width:70rem">
        <img class="card-img-top" src= <?php // include 'products.php'; $allProducts = unserialize($_SESSION["allProducts"]); echo $allProducts[0]->imagelink; ?> alt="Card image" style="width:100%">
        <div class="card-body">
        <h4 class="card-title"> <?php //include 'products.php'; $allProducts = unserialize($_SESSION["allProducts"]); echo $allProducts[0]->title; ?> </h4>
        <p class="card-text"><?php //include 'products.php'; $allProducts = unserialize($_SESSION["allProducts"]); echo $allProducts[0]->desc; ?></p>
        <button onclick="addtoCart()" class="btn btn-primary">Add to Cart</button>
        </div> </div> </div>
  </div>
  <script>
    function addtoCart() {
        <?php //include 'products.php'; $allProducts = unserialize($_SESSION["allProducts"]); $allProducts[0]->inCart = true; ?>
    }
  </script>
  </body>
  </html>