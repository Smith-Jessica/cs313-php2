<?php 
// Start the session
session_start();
if (isset($_SESSION['username'])) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
  } else {
    // Redirect them to the login page
    header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
  }

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


include 'products.php';

$allProducts = new Collection();
$id = $_GET["id"];
$qty = 1;

        if(isset($_SESSION['cart'])) {
          //add the product id to the orders table
          //order_id | cart_id | product_id | amount
          try {   
            $result = $db->prepare("INSERT INTO orders(cart_id,product_id,quantity) VALUES (:cart,:product,:qty)");
            $result->bindParam('cart', $_SESSION['cart']);
            $result->bindParam('product', $id);
            $result->bindParam('qty', $qty);
            $result->execute();
            $rows = $result->fetch(PDO::FETCH_ASSOC);
        }
  
        catch (Exception $e) {
            echo "Could not retrieve data from database". $e->getMessage();
            echo $title;
            $qty = 1;
            
            exit();
        }
             
            echo "<h1>The product has been added to your cart!</h1>"; 
            echo $rows['product'];
      }
        else { 
            echo "There was an error adding the product to your cart";

        }





?>