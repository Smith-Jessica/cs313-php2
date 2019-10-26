
<?php
// Start the session
session_start();

if ( isset( $_SESSION['username'] ) ) {
  // Grab user data from the database using the user_id
  // Let them access the "logged in only" pages
} else {
  // Redirect them to the login page
  header("Location: https://floating-ocean-98131.herokuapp.com/week03/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="week3.js"></script>
  <title>Browse Items</title>
</head>

<body>
  <h1>Your Cart</h1>
  <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>

<?php
    
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

foreach ($db->query('SELECT * FROM products') as $row)
{
  $title =  $row['title'];
  $desc = $row['description'];
  $img = $row['image'];
  $price = $row['price'];
  $category = $row['category'];
  $detail_pg = $row['detail_pg'];

  $allProducts->addItem(new Product($price, $img, $desc, $title, $detail_pg), $index);
}
        if(isset($_SESSION["cart"])) {

            //echo "session variable is set";
            for($x = 0; $x < $allProducts->length(); $x++){
              //  echo "in the first for loop";
                $y = $allProducts->getItem($x);
                //echo "it's not the y var";
                for($z = 0; $z < count($_SESSION["cart"]); $z++) {
                  // echo "in the second for loop"; 
                    if($_SESSION["cart"][$z] == $y->title) {
                        
                    //    echo "whatever";
                        echo "<tr>";
                        echo "<th scope=\"row\">$x</th>";
                        echo "<td>$y->title</td>";
                        echo "<td>$y->desc</td>";
                        echo "<td>1</td>";
                        echo "<td>$y->price</td>";
                        echo "<td><a href=\"removefromcart.php?title=" . $y->title ."\" class=\"btn btn-primary\">Remove from Cart</a></td>";
                        echo "</tr>";
                        
                        $total += $y->price;
                        $_SESSION["total"] = $total;
                    }
                }
            }
        }
        else {
            echo "<h1>There's nothing in your cart!</h1>";
        }
?>
</tbody>
<tfoot>
    <tr>
      <th colspan="4">Total :</th>
      <td><?php echo $_SESSION["total"]; ?> </td>
    </tr>
   </tfoot>
</table>
</div>

<a href="browse.php" class="btn btn-primary">Continue Shopping</a> <a href="checkout.php" class="btn btn-success">Checkout</a> 


</body>