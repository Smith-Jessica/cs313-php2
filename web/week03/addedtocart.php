<?php 
// Start the session
session_start();

include 'navbar.php';
include 'products.php';

        $allProducts = new Collection();
    
        $allProducts->addItem(new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light", 'light.php'), 0);
        $allProducts->addItem(new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub", 'hub.php'), 1);
        $allProducts->addItem(new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa", 'alexa.php'), 2);
   
$title = $_GET["title"];
for($x = 0; $x < $allProducts->length(); $x++){
    $y = $allProducts[$x];
    if($y->$title == $title) {
        if(isset($_SESSION["cart"])) {
            array_push($_SESSION["cart"], serialize($y));  echo "The product has been added!"; 
        }
        else { 
            $_SESSION["cart"] = array(serialize($y)); 
            echo "The product has been added, but the array wasn't set!";
        }
    }
    else {
        echo "could not find the product";
    }
}




?>