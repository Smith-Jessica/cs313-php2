<?php 
// Start the session
session_start();

include 'navbar.php';
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if(isset($_SESSION["cart"])) { //if the user is logged in
   
      try {
        $product_id = $_GET["id"];
        $result = $db->prepare("DELETE FROM orders WHERE cart_id= :cartid AND product_id = :prodid");
        $result->bindParam('cartid', $_SESSION['cart']);
        $result->bindParam('prodid', $product_id);
        $result->execute();
        
        
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