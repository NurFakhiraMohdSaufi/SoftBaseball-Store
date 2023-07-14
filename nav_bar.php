<?php 
if(!isset($_SESSION)){
  session_start();
  }

  if(isset($_SESSION['fld_staff_username']) && isset($_SESSION['fld_staff_num'])) {

 ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">

<div class="site-mobile-menu" style="background-color: #D27685;">
      <div class="site-mobile-menu-header" >
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body" ></div>
    </div>
    
    <header class="site-navbar" role="banner" style="background-color: #D27685;">

      
      <div class="container">
        <div class="row align-items-center" style="background-color: #D27685; padding: 10px;">
          
          <div class="col-11 col-xl-2">

            <h1 class="mb-0 site-logo font-effect-emboss"><a href="index.php" class="text-black mb-0" style="font-family: sofia; color: black; font-weight: bold; font-size: 25px;">SoftBaseball Store</a></h1>

          </div>
          <div class="col-12 col-md-10 d-none d-xl-block" >
            <nav class="site-navigation position-relative text-right" role="navigation"  >

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block" >
               

                <li class="active"><a href="index.php" style="font-family: trirong; color: black;"><span>Home</span></a></li>
                <li class="has-children">
                  <a style="font-family: trirong; color: black;"><span>Menu</span></a>
                  <ul class="dropdown arrow-top" style="background-color: #A84448; transition: 1.5s; ">
                    <li><a href="products.php" style="font-family: trirong; color: black;">Products</a></li>
                    <li><a href="customers.php" style="font-family: trirong; color: black;">Customers</a></li>
                    <li><a href="staffs.php" style="font-family: trirong; color: black;">Staffs</a></li>
                    <li><a href="orders.php" style="font-family: trirong; color: black;">Orders</a></li>
                  </ul>
                </li>

                <li class="has-children active" style=""><a style="font-family: sofia; color: black;"><span><center><?=$_SESSION['fld_staff_name']?><br>(<?=$_SESSION['fld_staff_role'] ?>)</center></span></a>
                    <ul class="dropdown arrow-top" style="background-color: #A84448; transition: 1.5s; ">
                    <li><a href="logout.php" style="font-family: trirong; color: black;">Log Out</a></li>
                </li>
              

              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>
  <?php } else {
    header("Location: login.php");
  }
 