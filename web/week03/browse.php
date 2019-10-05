<?php
    include 'products.php';

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
  <h1>Shop Here</h1>
  <div class="container">

    <?php
for($x = 0; $x < Products::$count; $x++){
  //$y = new Product(); -- This is my backup plan if the below does not work. 
//gonna try the below method first. See if it transfers over all of the Object info to $y
  $y = $allProducts[$x];
  var_dump($y);
echo "<div class=\"card\" style=\"width:400px\">" .
      "<img class=\"card-img-top\" src= alt=\"Card image\" style=\"width:100%\">" .
      "<div class=\"card-body\">" .
        "<h4 class=\"card-title\">" . $y->title . "</h4>" .
        "<p class=\"card-text\">" . $y->desc . "</p>" .
        "<a href=\"" . $y->detailLink . "\" class=\"btn btn-primary\">See Profile</a>" .
      "</div> </div>";
  }
  ?>
  </div>
</body>