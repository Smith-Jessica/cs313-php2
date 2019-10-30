<?php
// Start the session
session_start();

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
          
        $username = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['password']);
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT); 

     try {   
          $result = $db->prepare("SELECT password, cart_id FROM users WHERE username = :user AND password = :pass");
          $result->bindParam('user', $username);
          $result->bindParam('pass', $pass);
          $result->execute();
          $rows = $result->fetch(PDO::FETCH_ASSOC);
      }

      catch (Exception $e) {
          echo "Could not retrieve data from database". $e->getMessage();
          exit();
      }

      if ($passwordHash == $rows['password']) {
        $_SESSION['username'] = $username;
        $_SESSION['cart'] = $rows['cart_id'];
    } else {
        echo "Username or password incorrect";
    }
     
        
?>
<?php 
include 'navbar.php';
if (isset($_SESSION['username'])) {
    echo "Success! You are now logged in!";
    header("Location: https://floating-ocean-98131.herokuapp.com/week03/dashboard.php");
  }
  else {
      echo "the session variable was not set. I'm sorry.";
  }
?>