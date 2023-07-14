<?php 

if (isset($_GET['login']) && $_GET['login'] === "success") {
  echo '<script>alert("Welcome to the SoftBaseball Store ! ! !")</script>';


} ?>
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="stylesheet" href="fontsnav/icomoon/style.css">

    <link rel="shortcut icon" type="image/jpg" href="pictures/logo.ico" />

    <link rel="stylesheet" href="cssnav/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="cssnav/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="cssnav/style.css">

    <link rel="stylesheet" href="style.css">

    <title>SoftBaseball Store : Index</title>
  </head>
  
 <body>

    <?php 
      include_once 'nav_bar.php';
     ?>


    <br><br><br><br><br>
    <center>
      <img src="pictures/logo.png" style="scale: 80%;">
   <br><br>

    <h2 style="font-family:Sofia;">Let's find your hobby equipment here!</h2>
    <br><br>

    <img src="pictures/index2.jpg" style="width: 40%; border: solid 10px;">
    </center>
  


    <script src="jsnav/jquery-3.3.1.min.js"></script>
    <script src="jsnav/popper.min.js"></script>
    <script src="jsnav/bootstrap.min.js"></script>
    <script src="jsnav/jquery.sticky.js"></script>
    <script src="jsnav/main.js"></script>
  </body>
</html>