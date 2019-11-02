<?php 
// Start the session
session_start();

include 'navbar.php';


if(isset($_SESSION["cart"])) { //if the user is logged in
    //get the all product ids where the cart $id == $_SESSION['cart]
    echo "the session cart is set, going to get the data from db\n";
      try {
        $product_id = $_GET["id"];
        echo "the GET variable is fine\n";
        $result = $db->prepare("DELETE FROM orders WHERE cart_id= :cartid AND product_id = :prodid");
        echo "the prepare statement is fine\n";
        $result->bindParam('cartid', $_SESSION['cart']);
        echo "bindParam cart_id is fine\n";
        $result->bindParam('prodid', $product_id);
        echo "bindParam product_id is fine\n";
        $result->execute();
        echo "execution is fine\n";
        
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