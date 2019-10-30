<?php
// Start the session
session_start();

echo "Session has been started going to connect to the db.";
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
        
        echo "Username is: " . $username;
     try {   
       echo "in the try going to get some data from the db";
          $result = $db->prepare("SELECT password, id FROM users WHERE username = :user AND password = :pass");
          $result->bindParam('user', $username);
          $result->bindParam('pass', $pass);
          $result->execute();
          $rows = $result->fetch(PDO::FETCH_ASSOC);
      }

      catch (Exception $e) {
          echo "Could not retrieve data from database". $e->getMessage();
          exit();
      }
      echo $rows['password'];

    if (password_verify($pass, $rows['password'])) {
      echo "Password is correct\n";
        // Correct Password
        $_SESSION['username'] = $username;
        $_SESSION['cart'] = $rows['id'];
    } else {
        // Wrong password
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