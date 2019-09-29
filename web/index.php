<?php

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

<div class="container -fluid">
  <div class="row">
  <div class="tableHeaders p-5 m-5 col-8 col-sm-offset-3">Assignments</div>
</div>
<div class="row p-5 m-5">
  <a class="btn btn-primary col-8 col-sm-offset-3" href='/team02/teamAct.php'>Week02 Team Activity</a>
</div>
<div class="row p-5 m-5">
  <a class="btn btn-primary col-8 col-sm-offset-3" href=''>Week03 Team Activity</a>
</div>
<div class="row p-5 m-5">
  <a class="btn btn-primary col-8 col-sm-offset-3" href=''>Week03 Ponder Activity</a>
</div>
<div class="row p-5 m-5">
  <a class="btn btn-primary col-8 col-sm-offset-3" href=''>Week04 Team Activity</a>
</div>
<div class="row p-5 m-5">
  <div class="col-8 col-sm-offset-1 p-5 m-5">
    <div class="card w-25 bg-primary text-white p-5 m-5" style="width: 18rem;" onmouseover="initDivMouseOver()">
    <div class="card-header bg-primary text-white p-5 m-5">Visitor Counter</div>
      <div class="card-body p-5 m-5">
        <p class="card-text p-5 m-5">You are visitor number <?echo $count;?>!</p>
      </div>
    </div>
</div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>

