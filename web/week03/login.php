<?php
// Start the session
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
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

        
  
    $username = $_POST['username'];
    $password = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM user WHERE username=:username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // Verify user password and set $_SESSION
        if ( password_verify( $_POST['password'], $user->password ) ) {
          $_SESSION['user_id'] = $user->id;
        }
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
  <title>Browse Items</title>
</head>

<body>
  <h1>Lively Automation</h1>
  <div class="container-fluid">
<?php include 'navbar.php'; ?>

<form action="" method="post">
<div class="form-group row">
<label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" id="inputUsername" placeholder="username" required>
      </div>
</div>
<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
    </div>
</div>

    <button class="btn btn-primary col-sm-5" type="submit" value="Submit">
</form>