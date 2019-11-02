<?php 
// Start the session
session_start();

include 'navbar.php';
include 'products.php';

if(isset($_SESSION["cart"])) { //if the user is logged in
    //get the all product ids where the cart $id == $_SESSION['cart]
    //echo "the session cart is set, going to get the data from db\n";
      try {   
        $result = $db->prepare("DELETE FROM orders WHERE cart_id= :cartid AND product_id = :prodid");
        $result->bindParam('cartid', $_SESSION['cart']);
        $result->bindParam('prodid', $_GET["id"]);
        $result->execute();
        
        $product_id = $_GET["id"];
        echo "<h1>The product has been removed from your cart!</h1>";
      }
    catch (Exception $e) {
            echo "Could not delete data from database". $e->getMessage();
            exit();
        }
        
      }
      else {
          echo "<h1>You don't have anything in your cart!</h1>";
      }   
        





?>