
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
    include 'products.php';

    $allProducts = new Collection();
    
        $allProducts->addItem(new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light", 'light.php'), 0);
        $allProducts->addItem(new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub", 'hub.php'), 1);
        $allProducts->addItem(new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa", 'alexa.php'), 2);

      


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