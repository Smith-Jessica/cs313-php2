<?php
phpinfo();
// Add path to countlog.txt file.
$path = 'countlog.txt';

// Opens countlog.txt to read the number of hits.
$file  = fopen( $path, 'r' );
$count = fgets( $file, 1000 );
fclose( $file );

// Update the count.
$count = abs( intval( $count ) ) + 1;

// Opens countlog.txt to change new hit number.
$file = fopen( $path, 'w' );
fwrite( $file, $count );
fclose( $file );

?>

<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
   <script src="homepage.js"></script>
   <link rel="stylesheet" type="text/css" href="homepage.css">

   <title>CS313 -- Jessica's Assignments</title>
</head>
<body>
<?php include 'navbar.php';?>
<div class="container-fluid">

    <div class="d-flex justify-content-center align-items-center jumbotron">

        <div id="title">Jessica's Homepage</div>

    </div>

</div>

<div class="container">
  <div class="row">
    <div class="col-8 col-sm-offset-2 tableHeaders">About Me</div>
  </div>
  <div class="row">
    <div class="col-8 col-sm-offset-2"><p>My name is Jessica. I am in my last semester of school. I will graduate with an Associate's Degree in Computer Programming. I only plan to pursue a bachelor's degree if my employer requests it of me(and subsequently pays for it). I have been married for almost 2 years now. I enjoy mountain biking, hiking and playing PC games with my husband. My favorite color is green. That's the only favorite thing that has stayed with me. I don't have a favorite movie, song or book. I have some that I like but I don't have any that I would call my absolute favorite. </p></div>
  </div>
</div>

<div class="container-fluid" id="footer">

    <div class="card w-25 bg-primary text-white p-5 m-5">
    <div class="card-header bg-primary text-white p-5 m-5">Visitor Counter</div>
      <div class="card-body p-5 m-5">
        <p class="card-text p-5 m-5">You are visitor number <?echo $count;?>!</p>
      </div>
    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>

