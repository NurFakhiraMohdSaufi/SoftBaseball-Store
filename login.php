<?php 
    include_once 'database.php';
 ?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire|outline|emboss|shadow-multiple">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

    <link rel="shortcut icon" type="image/jpg" href="pictures/logo.ico" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="csslogin/style.css">

    <link rel="icon" type="image/png" href="imagelogin2/icons/favicon.ico">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorlogin2/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fontslogin2/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fontslogin2/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorlogin2/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendorlogin2/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorlogin2/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorlogin2/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendorlogin2/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="csslogin2/util.css">
    <link rel="stylesheet" type="text/css" href="csslogin2/main.css">
<!--===============================================================================================-->

    <style type="text/css">
                /* The alert message box */
        .alert {
          padding: 20px;
          background-color: #f44336; /* Red */
          color: white;
          margin-bottom: 15px;
          opacity: 1;
          transition: opacity 0.6s;
        }

        /* The close button */
        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
          color: black;
        }
    </style>

    <title>SoftBaseball Store : Login</title>
    

    </head>

    <body class="img js-fullheight" style="background-image: url(pictures/bglogin.gif);">
    <section class="ftco-section" style="height: 100%; padding:60px; ">
        <div class="container" style="border: solid; border-radius: 10px; width: 60%; background: #FFE7CE; opacity: 1;" >
            <div class="row justify-content-center">

                <div class="col-md-6 text-center mb-5" style="margin: 20px;">
                     <h1 class="heading-section font-effect-fire" style="font-family: Sofia; font-size: 30px; font-stretch: 10px; line-height: 1.5;
                     color: black;
                      letter-spacing: 10px;">SOFTBASEBALL STORE</h1><br>
                     <img src="pictures/logo.png" >
                     <br><br>
                    <?php if(isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert"><?=$_GET['error']?>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            
                        </div> 
                        <?php  } ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                
                <form action="validation.php" class="signin-form" method="POST">

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
                        <input name="username" type="text" class="input100" placeholder="Username" required autofocus>
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                <div class="wrap-input100 validate-input " data-validate="Password is required">
                  <input id="password-field" name="password" type="password" class="input100" placeholder="Password" required>
                  <span class="focus-input100" data-symbol="" toggle="#password-field"></span>
                    
                </div>

                <br><br>
                <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                    <br>

              </form>
             
              </div>
                </div>
            </div>
        </div>
    </section>

    <script src="jslogin/jquery.min.js"></script>
  <script src="jslogin/popper.js"></script>
  <script src="jslogin/bootstrap.min.js"></script>
  <script src="jslogin/main.js"></script>

  <script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

<script src="jslogin2/main.js"></script>

     <script src="jslogin/jquery.min.js"></script>
  <script src="jslogin/popper.js"></script>
  <script src="jslogin/bootstrap.min.js"></script>
  <script src="jslogin/main.js"></script>

    </body>
</html>

