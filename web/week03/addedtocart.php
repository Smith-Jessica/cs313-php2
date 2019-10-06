<?php 
// Start the session
session_start();

include 'navbar.php';

$title = $_GET["title"];

if(isset($_SESSION["allProducts"])) {
    array_push($_SESSION["allProducts"], $title);  echo "The product has been added!"; 
}
else { 
    $_SESSION["allProducts"] = array($title); 
    echo "The product has been added!";
}


?>