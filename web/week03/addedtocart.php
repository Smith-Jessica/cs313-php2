<?php 
// Start the session
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
  } else {
    // Redirect them to the login page
    header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
  }
  
include 'navbar.php';
include 'products.php';

        $allProducts = new Collection();
    
        $allProducts->addItem(new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light", 'light.php'), 0);
        $allProducts->addItem(new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub", 'hub.php'), 1);
        $allProducts->addItem(new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa", 'alexa.php'), 2);
   
$title = $_GET["title"];

        if(isset($_SESSION["cart"])) {
            array_push($_SESSION["cart"], $title);  echo "<h1>The product has been added to your cart!</h1>"; 
        }
        else { 
            $_SESSION["cart"] = array($title); 
            echo "<h1>The product has been added to your cart!</h1>";
        }





?>