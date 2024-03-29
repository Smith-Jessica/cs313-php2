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
  <title>Browse Items</title>
</head>

<body>
  <h1>Lively Automation</h1>
  <div class="container-fluid">
  
<?php
include 'navbar.php';
?>
<?php
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


include 'products.php';

$allProducts = new Collection();

foreach ($db->query('SELECT * FROM products') as $row)
{
  $title =  $row['title'];
  $desc = $row['description'];
  $img = $row['image'];
  $price = $row['price'];
  $category = $row['category'];
  $detail_pg = $row['detail_pg'];
  $id = $row['id'];

  $allProducts->addItem(new Product($price, $img, $desc, $title, $detail_pg, $id), $index);
}

      for($x = 0; $x < $allProducts->length(); $x++){
        $y = $allProducts->getItem($x);
        echo "<div class=\"container-fluid\">";
        echo "<div class=\"row\">";
        echo "<div class=\"col-sm-6 d-flex justify-content-center\">";
        echo "<div class=\"card\" style=\"width:40rem\">";
        echo "<img class=\"card-img-top\" src=\"" . $y->imagelink . "\" alt=\"Card image\" style=\"width:100%\">";
        echo "<div class=\"card-body\">";
        echo "<h4 class=\"card-title\">" . $y->title . "</h4>";
        echo "<p class=\"card-text\">" . $y->desc . "</p>";
        echo "<a href=\"$y->detailLink\" class=\"btn btn-primary\">See Product</a>";
        echo "</div> </div> </div>";
      }

  ?>
  </div>
</body>