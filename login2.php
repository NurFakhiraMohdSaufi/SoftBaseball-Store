<?php 
    include_once 'database.php';
 ?>
<html lang="en"><head>
	<title>SoftBaseball Store : Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="imagelogin2s/icons/favicon.ico">
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

<link rel="shortcut icon" type="image/jpg" href="pictures/logo.ico" />

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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(pictures/bglogin.gif); height: 100%; margin: 10x; ">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="opacity: 0.9;">
				<form class="login100-form validate-form" method="POST" action="validation2.php">
					<span class="login100-form-title p-b-49" style="font-size: 20px;">
						SOFTBASEBALL STORE
					</span>
					<center>
					 <img src="pictures/logo.png" style="scale: 80%;">
					 </center>

					 <?php if(isset($_GET['error'])) { ?>
					 	<div class="alert alert-danger" role="alert"><?=$_GET['error']?>
					 	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
					 		
					 	</div>
					 <?php } ?>

                        

					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol=""></span>
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
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendorlogin2/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin2/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin2/bootstrap/js/popper.js"></script>
	<script src="vendorlogin2/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin2/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin2/daterangepicker/moment.min.js"></script>
	<script src="vendorlogin2/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin2/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="jslogin2/main.js"></script>

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


</body></html>