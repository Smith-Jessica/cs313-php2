<?php
// Start the session
session_start();

if (isset( $_SESSION['username']) ) {
  // Grab user data from the database using the user_id
  // Let them access the "logged in only" pages
  unset($_SESSION["username"]);
  unset($_SESSION["cart"]);

  // Redirect them to the login page
  header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
}
?>