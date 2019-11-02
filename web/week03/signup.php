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
<?php include 'navbar.php'; ?>

<?php 

  if(!isset($_SESSION['username'])) {
    echo "<form action=\"newUser.php\" method=\"POST\">";
    echo "<div class=\"form-group row\">";
    echo "<label for=\"inputFirst\" class=\"col-sm-2 col-form-label\">First Name</label>";
    echo "<div class=\"col-sm-10\">";
      echo "<input type=\"text\" class=\"form-control\" name=\"first_name\" id=\"inputFirst\" placeholder=\"First Name\" required>";
      echo "</div>";
      echo "</div>";
    echo "<div class=\"form-group row\">";
    echo "<label for=\"inputLast\" class=\"col-sm-2 col-form-label\">Last Name</label>";
    echo "<div class=\"col-sm-10\">";
      echo "<input type=\"text\" class=\"form-control\" name=\"last_name\" id=\"inputLast\" placeholder=\"Last Name\" required>";
      echo "</div>";
    echo "</div>";
    echo "<div class=\"form-group row\">";
    echo "<label for=\"inputUsername\" class=\"col-sm-2 col-form-label\">Username</label>";
    echo "<div class=\"col-sm-10\">";
      echo "<input type=\"text\" class=\"form-control\" name=\"username\" id=\"inputUsername\" placeholder=\"username\" required>";
      echo "</div>";
    echo "</div>";
    echo "<div class=\"form-group row\">";
    echo "<label for=\"inputPassword\" class=\"col-sm-2 col-form-label\">Password</label>";
    echo "<div class=\"col-sm-10\">";
      echo "<input type=\"password\" class=\"form-control\" name=\"password\" id=\"inputPassword\" placeholder=\"Password\" required>";
    echo "</div>";
    echo "</div>";

    echo "<button class=\"btn btn-primary col-sm-5\" type=\"submit\" value=\"Sign up\">Sign Up</button>";
    echo "</form>";
  }
  else {
    echo "<div>You are already a member! Yay!</div>";
  }
?>
</div>
</body>
