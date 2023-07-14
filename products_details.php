<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My SoftBaseBall Ordering System : Products Details</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="stylesheet" href="fontsnav/icomoon/style.css">

    <link rel="shortcut icon" type="image/jpg" href="pictures/logo.ico"/>

    <link rel="stylesheet" href="cssnav/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="cssnav/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="cssnav/style.css">
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- style -->
    <link rel="stylesheet" href="style.css">
  
</head>
<body style="background: #A6808C">

  <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a188791_pt2 WHERE fld_product_num = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-10  col-xs-offset-1 well text-center">
          <?php if ($readrow['fld_product_image'] == "") {
            echo "No image";
          }
          else { ?>
            <img src="products/<?php echo $readrow['fld_product_image']?>" class="img-responsive">
          <?php } ?>
        </div>

        <div class="col-xs-10 col-xs-offset-1 well">
          <div class="panel panel-default">
            <div class="panel-heading">
              <strong>
                Product Details
              </strong>          
            </div>
            <div class="panel-body">
              Below are the specifications of the product.
            </div>
            <table class="table">
              <tr>
                <td class="col-xs-4 col-ms-4 col-md-4">
                  <strong>
                    Product ID
                  </strong>
                </td>
                <td><?php echo $readrow['fld_product_num'] ?></td>
              </tr>

              <tr>
                <td><strong>Name</strong></td>
                <td><?php echo $readrow['fld_product_name'] ?></td>
              </tr>

              <tr>
                <td><strong>Price</strong></td>
                <td><?php echo $readrow['fld_product_price'] ?></td>
              </tr>

              <tr>
                <td><strong>Brand</strong></td>
                <td><?php echo $readrow['fld_product_brand'] ?></td>
              </tr>

              <tr>
                <td><strong>Color</strong></td>
                <td><?php echo $readrow['fld_product_color'] ?></td>
              </tr>

              <tr>
                <td><strong>Category</strong></td>
                <td><?php echo $readrow['fld_product_category'] ?></td>
              </tr>

              <tr>
                <td><strong>Quantity</strong></td>
                <td><?php echo $readrow['fld_product_quantity'] ?></td>
              </tr>
              
            </table>
          </div>
          
        </div>
        
      </div>
      
    </div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="jsnav/jquery-3.3.1.min.js"></script>
    <script src="jsnav/popper.min.js"></script>
    <script src="jsnav/bootstrap.min.js"></script>
    <script src="jsnav/jquery.sticky.js"></script>
    <script src="jsnav/main.js"></script>

</body>
</html>
