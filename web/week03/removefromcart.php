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

            
            if (($key = array_search($title, $_SESSION["cart"])) !== false) {
                unset($_SESSION["cart"][$key]); echo "<h1>The product has been removed from your cart!</h1>"; 
            }
        





?>