<?php
session_start();
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
   <script src="homepage.js"></script>
   <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">CS313 Homepage</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="browse.php">Home</a></li>
      <li class="active"><a href="cart.php">View Cart</a></li>
      <li class="active pull-right"><a class="btn btn-success" href="login.php">Login</a></li>
      <?php if(!isset($_SESSION['cart'])) { echo "<li class=\"active pull-right\"><a class=\"btn btn-success\" href=\"signup.php\">Sign Up</a></li>";} ?>
      <li class="active pull-right"><a class="btn btn-success" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>