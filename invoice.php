<?php
  include_once 'database.php';

  if(!isset($_SESSION)){
  session_start();
  }

  if(isset($_SESSION['fld_staff_username']) && isset($_SESSION['fld_staff_num'])) {
  
?>
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_orders_a188791, tbl_staffs_a188791_pt2,
      tbl_customers_a188791_pt2, tbl_orders_details_a188791 WHERE
      tbl_orders_a188791.fld_staff_num = tbl_staffs_a188791_pt2.fld_staff_num AND
      tbl_orders_a188791.fld_customer_num = tbl_customers_a188791_pt2.fld_customer_num AND
      tbl_orders_a188791.fld_order_num = tbl_orders_details_a188791.fld_order_num AND
      tbl_orders_a188791.fld_order_num = :oid");
  $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $oid = $_GET['oid'];
  $stmt->execute();
  $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Invoice</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

      <link rel="shortcut icon" type="image/jpg" href="pictures/logo.ico" />

      <style type="text/css">
        h1 {
          font-family: sofia;
        }

        h5 {
          font-family: viga;
        }

        .panel-heading {
          font-family: lato;
          font-weight: bolder;
          background-color: #ACB1D6;
        }

        .panel-body {
          font-family: lato;
          font-weight: bolder;
          font-size: 16px;
          background-color: #8294C4;

        }

        .table {
          font-family: open sans;
          background-color: #ACB1D6;
        }

        body {
          margin: 50px;
          padding: 10px;
          border: solid 10px;
          background: #DBDFEA;
        }
      </style>

</head>

<table>
<body style="background: #AF9BB6" >
 
<div class="row">
<div class="col-xs-6 text-center">
  <br>
    <img src="pictures/logo.png" width="25%" height="50%">
</div>
<div class="col-xs-6 text-right">
  <h1>INVOICE</h1>
  <h5>Order: <?php echo $readrow['fld_order_num'] ?></h5>
  <h5>Date: <?php echo $readrow['fld_order_date'] ?></h5>
</div>
</div>
<hr>
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading" style="background-color: #ACB1D6;">
        <h4>From : SoftBaseball Store Sdn. Bhd.</h4>
      </div>
      <div class="panel-body" >
        <p>
        Kolej Pendeta Za'ba <br>
        UKM <br>
        43600 Bangi <br>
        Selangor <br>
        </p>
      </div>
    </div>
  </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #ACB1D6;">
              <h4>To : <?php echo $readrow['fld_customer_name'] ?></h4>
            </div>
            <div class="panel-body">
              <?php 
              $str = $readrow['fld_customer_address'];

              $words = explode(",", $str);
               ?>
        <p>
        <?php foreach ($words as $word) {
          echo $word;
          echo "<br>";
        } ?>

        </p>
            </div>
        </div>
    </div>
</div>
 
<table class="table table-bordered" style="border: solid 3px;">
  <tr>
    <th>No</th>
    <th>Product</th>
    <th class="text-right">Quantity</th>
    <th class="text-right">Price(RM)/Unit</th>
    <th class="text-right">Total(RM)</th>
  </tr>
  <?php
  $grandtotal = 0;
  $counter = 1;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a188791,
        tbl_products_a188791_pt2 where 
        tbl_orders_details_a188791.fld_product_num = tbl_products_a188791_pt2.fld_product_num AND
        fld_order_num = :oid");
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
    $stmt->execute();
    $result = $stmt->fetchAll();
  }
  catch(PDOException $e){
        echo "Error: " . $e->getMessage();
  }
  foreach($result as $detailrow) {
  ?>
  <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $detailrow['fld_product_name']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_product_price']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity']; ?></td>
  </tr>
  <?php
    $grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity'];
    $counter++;
  } // while
  ?>
  <tr>
    <td colspan="4" class="text-right">Grand Total</td>
    <td class="text-right"><?php echo $grandtotal ?></td>
  </tr>
</table>
 
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading" style="background-color: #ACB1D6;">
        <h4>Bank Details</h4>
      </div>
      <div class="panel-body">
        <p>Nur Fakhira Binti Mohd Saufi</p>
        <p>Kyra Islamic Bank</p>
        <p>Account Number : 0123456</p>
      </div>
    </div>
    </div>
  <div class="col-xs-7">
    <div class="span7">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #ACB1D6;">
          <h4>Contact Details</h4>
        </div>
        <div class="panel-body">
          <p> Staff: <?php echo $readrow['fld_staff_name'] ?> </p>
          <p> Phone Number: <?php echo $readrow['fld_staff_phone'] ?> </p>
          <p><br></p>
          <p><br></p>
          <p>Computer-generated invoice. No signature is required.</p>
        </div>
      </div>
    </div>
  </div>
</div>

 
</body>
</html>
  <?php } else {
    header("Location: login.php");
  }