<?php 
// Start the session
session_start();

include 'navbar.php';

$title = $_GET["title"];

if(isset($_SESSION["cart"])) {
    array_push($_SESSION["cart"], $title);  echo "The product has been added!"; 
}
else { 
    $_SESSION["cart"] = array($title); 
    echo "The product has been added!";
}


?>