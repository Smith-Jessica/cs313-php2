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
/*
    
    $password = $_POST['password'];

    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    
    $stmt->execute();
    $result = $stmt->get_result();
  $user = $result->fetch_object();
  
*/
        
        
        //$result = $db->query("SELECT * FROM user");
        $username = $_POST['username'];
        $result = $db->prepare("SELECT username FROM users WHERE username = ':username';");
        


          //echo $result;
        //$stmt = $db->prepare("SELECT * FROM user WHERE username=:username");
        //$stmt->execute(['username' => $username]);
        //$stmt->bind_param('s', $_POST['username']);
        //$stmt->execute();
        //$result = $stmt->get_result();
        //$user = $result->fetch_object();
       // $user = $stmt->fetch();

        // Verify user password and set $_SESSION
        //if (password_verify( $_POST['password'], $user["password"])) {
        //  $_SESSION['user_id'] = $user["id"];
       // }
       
        
?>
<?php 
include 'navbar.php';
if (isset($_SESSION['user_id'])) {
    echo "Success! You are now logged in!";
  }
  else {
      echo "the session variable was not set. I'm sorry.";
  }
?>