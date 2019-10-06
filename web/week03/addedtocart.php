<?php 
// Start the session
session_start();

include 'navbar.php';
include 'products.php';

$allProducts = unserialize($_SESSION["allProducts"]);

$title = $_GET["title"];
for($x = 0; $x < $allProducts->count(); $x++){
    $y = $allProducts[$x];
    if($y->$title == $title) {
        if(isset($_SESSION["cart"])) {
            array_push($_SESSION["cart"], $y);  echo "The product has been added!"; 
        }
        else { 
            $_SESSION["cart"] = array($y); 
            echo "The product has been added, but the array wasn't set!";
        }
    }
    else {
        echo "could not find the product";
    }
}




?>