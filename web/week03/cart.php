
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
  <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>

<?php
    include 'products.php';

    $allProducts = new Collection();
    
        $allProducts->addItem(new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light", 'light.php'), 0);
        $allProducts->addItem(new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub", 'hub.php'), 1);
        $allProducts->addItem(new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa", 'alexa.php'), 2);

      for($x = 0; $x < $allProducts->length(); $x++){
        $y = $allProducts->getItem($x);
        if($y->inCart) {
            echo "<tr>";
            echo "<th scope=\"row\">$x</th>";
            echo "<td>$y->title</td>";
            echo "<td>$y->desc</td>";
            echo "<td>1</td>";
            echo "<td>$y->price</td>";
            echo "</tr>";
        }
      }
?>
</tbody>
</table>
</div>

PUT the Total Here

<button></button>


</body>