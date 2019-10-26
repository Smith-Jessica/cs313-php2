<?php
// Start the session
session_start();

if ( isset( $_SESSION['username'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    $username = $_SESSION['username'];
  } else {
    // Redirect them to the login page
    header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
  }
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
//$username = $_SESSION['username'];

echo "<h1>Welcome " . $username . "!</h1>";

?>