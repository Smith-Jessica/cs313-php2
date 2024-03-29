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
  <h1>Product Details</h1>
  <?php include 'navbar.php';?>
  <div class="container">
  <?php 
        include 'products.php';
       
        try
          {
            $dbUrl = getenv('DATABASE_URL');

            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"],'/');

            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }
          catch (PDOException $ex)
          {
            echo 'Error!: ' . $ex->getMessage();
            die();
          }

        $detail_pg = 'alexa.php';
        $stmt = $db->prepare("SELECT * FROM products WHERE detail_pg=:detail_pg");
        $stmt->execute(['detail_pg' => $detail_pg]); 
        $product = $stmt->fetch();


        echo "<div class=\"container\">";
        echo "<div class=\"row\">";
        echo "<div class=\"col-sm-6 d-flex justify-content-center\">";
        echo "<div class=\"card\" style=\"width:70rem\">";
        echo "<img class=\"card-img-top\" src=\"" . $product["image"] . "\" alt=\"Card image\" style=\"width:100%\">";
        echo "<div class=\"card-body\">";
        echo "<h4 class=\"card-title\">$" . $product["price"] . ".00</h4>";
        echo "<h4 class=\"card-title\">" . $product["title"] . "</h4>";
        echo "<p class=\"card-text\">" . $product["desc"] . "</p>";
        echo "<a href=\"addedtocart.php?id=" . $product["id"] ."\" class=\"btn btn-primary\">Add to Cart</a>";
        echo "</div> </div> </div>";
 ?>
  </div>
  </body>
  </html>