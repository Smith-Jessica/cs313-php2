<?php 
// Start the session
session_start();

include 'navbar.php';
include 'products.php';

if(isset($_SESSION["allProducts"])) {
    array_push($_SESSION["allProducts"], 0);  echo "success!"; 
}
else { 
    $_SESSION["allProducts"] = array(0); 
    echo "success!";
}


?>