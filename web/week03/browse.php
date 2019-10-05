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
  <h1>Shop Here</h1>
  <div class="container-fluid">
<?php
include 'navbar.php';
include 'products.php';

        $allProducts = new Collection();
    
        $allProducts->addItem(new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light", 'light.php'), 0);
        $allProducts->addItem(new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub", 'hub.php'), 1);
        $allProducts->addItem(new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa", 'alexa.php'), 2);

      for($x = 0; $x < $allProducts->length(); $x++){
        $y = $allProducts->getItem($x);

        echo "<div class=\"container-fluid\">";
        echo "<div class=\"row\">";
        echo "<div class=\"col-sm-6 d-flex justify-content-center\">";
        echo "<div class=\"card\" style=\"width:25rem\">";
        echo "<img class=\"card-img-top\" src= alt=\"Card image\" style=\"width:100%\">";
        echo "<div class=\"card-body\">";
        echo "<h4 class=\"card-title\">" . $y->title . "</h4>";
        echo "<p class=\"card-text\">" . $y->desc . "</p>";
        echo "<a href=\"" . $y->detailLink . "\" class=\"btn btn-primary\">See Product</a>";
        echo "</div> </div> </div>";

      }

  ?>
  </div>
</body>