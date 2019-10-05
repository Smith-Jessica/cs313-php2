<?php
    include 'products.php';

?>

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
<div class="container">

LOOP HERE
<?php
for($x = 0; $x < Products::$count; $x++){

  <div class="card" style="width:400px">
      <img class="card-img-top" src= alt="Card image" style="width:100%">
      <div class="card-body">
        <h4 class="card-title">John Doe</h4>
        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
        <a href="#" class="btn btn-primary">See Profile</a>
      </div>
    </div>
  }
  ?>
  </div>
</body>