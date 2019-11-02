<?php
// Start the session
session_start();

if (isset($_SESSION['username'])) {
 
  unset($_SESSION["username"]);
  unset($_SESSION["cart"]);

  // Redirect them to the login page
  header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
}
else
{
    // Redirect them to the login page
    header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
}
?>