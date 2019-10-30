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
        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);

        //hash the password before adding it to the database
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);



     try {   
          $result = $db->prepare("INSERT INTO users (first_name, last_name, username, password) VALUES(:fname, :lname, :user, :pass)");
          $result->bindParam('fname', $fname);
          $result->bindParam('lname', $lname);
          $result->bindParam('user', $username);
          $result->bindParam('pass', $passwordHash);
          $result->execute();
          $rows = $result->fetch(PDO::FETCH_ASSOC);

          $_SESSION['username'] = $username;
      }
      catch (Exception $e) {
          echo "Could not create new user". $e->getMessage();
          exit();
      }
     
        
?>
<?php 
include 'navbar.php';
if (isset($_SESSION['username'])) {
    echo "Success! You are now a member!";
    header("Location: https://floating-ocean-98131.herokuapp.com/week03/dashboard.php");
  }
  else {
      echo "the session variable was not set. I'm sorry.";
  }
?>