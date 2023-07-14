<?php
  include_once 'orders_details_crud.php';
  
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Bike Ordering System : Orders Details</title>

  <!-- Bootstrap -->
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="stylesheet" href="fontsnav/icomoon/style.css">

    <link rel="shortcut icon" type="image/jpg" href="pictures/logo.ico" />

    <link rel="stylesheet" href="cssnav/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="cssnav/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="cssnav/style.css">
  <!-- Bootstrap -->
  
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


          <!-- datatable..css-->
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />

    <!-- style -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
      <!-- HTML !-->

/* CSS */
.button-85 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
}
    </style>
      
</head>
<body>
 
<?php include_once 'nav_bar.php'; ?>
 <br><br><br><br><br><br><br>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_orders_a188791, tbl_staffs_a188791_pt2,
          tbl_customers_a188791_pt2 WHERE
          tbl_orders_a188791.fld_staff_num = tbl_staffs_a188791_pt2.fld_staff_num AND
          tbl_orders_a188791.fld_customer_num = tbl_customers_a188791_pt2.fld_customer_num AND
          fld_order_num = :oid");
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
 
<div class="container-fluid">
  <div class="row" >
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" >
      <div class="panel panel-default">
        <div class="panel-heading" ><strong>Order Details</strong></div>
        <div class="panel-body" style=" font-family:viga, sans-serif;">
            Below are details of the order.
        </div>
        <table class="table page" style=" font-family:viga, sans-serif;">
          <tr>
            <td class="col-xs-4 col-sm-4 col-md-4"><strong>Order ID</strong></td>
            <td><?php echo $readrow['fld_order_num'] ?></td>
          </tr>
          <tr>
            <td><strong>Order Date</strong></td>
            <td><?php echo $readrow['fld_order_date'] ?></td>
          </tr>
          <tr>
            <td><strong>Staff</strong></td>
            <td><?php echo $readrow['fld_staff_name']?></td>
          </tr>
          <tr>
            <td><strong>Customer</strong></td>
            <td><?php echo $readrow['fld_customer_name'] ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2><center>Add a Product</center></h2>
      </div>
      <form action="orders_details.php" method="post" class="form-horizontal" name="frmorder" id="forder" onsubmit="return validateForm()">
      <div class="form-group">
          <label for="prd" class="col-sm-3 control-label">Product</label>
          <div class="col-sm-9">
            <select name="pid" class="form-control" id="prd" style="color: black;">
            <option value="">Please select</option>
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a188791_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $productrow) {
          ?>
          <option value="<?php echo $productrow['fld_product_num']; ?>"><?php echo $productrow['fld_product_brand']." ".$productrow['fld_product_name']; ?>
            
          </option>
          <?php
          }
          $conn = null;
          ?>
          </select>
        </div>
      </div>
      <div class="form-group">
          <label for="qty" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
            <input name="quantity" type="number" class="form-control" id="qty" min="1">
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <input name="oid" type="hidden" value="<?php echo $readrow['fld_order_num'] ?>">
        <button class="btn btn-default font-button" type="submit" name="addproduct"><span class="glyphicon glyphicon-plus " aria-hidden="true"></span> Add Product</button>
        <button class="btn btn-default font-button" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Products in this order</h2>
      </div>
      <table id="datatable" class="table table-striped table-bordered hover font-button">
        <thead>
      <tr>
        <th>Order Detail ID</th>
        <th>Product</th>
        <th>Quantity</th>
        <th></th>
      </tr>
      </thead>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a188791,
            tbl_products_a188791_pt2 WHERE
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
        <td><?php echo $detailrow['fld_order_detail_num']; ?></td>
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
        <td>
          <center>
          <a href="orders_details.php?delete=<?php echo $detailrow['fld_order_detail_num']; ?>&oid=<?php echo $_GET['oid']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs button-29" role="button">Delete
          </a>
          </center>
        </td>
      </tr>
      <?php } ?>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <a href="invoice.php?oid=<?php echo $_GET['oid']; ?>" target="_blank" role="button" class="button-85 font-button" style="color: white;"><center>Generate Invoice</center></a>
    </div>
  </div>
  <br>
</div>

<script type="text/javascript">
 
  function validateForm() {
 
      var x = document.forms["frmorder"]["pid"].value;
      var y = document.forms["frmorder"]["quantity"].value;
      //var x = document.getElementById("prd").value;
      //var y = document.getElementById("qty").value;
      if (x == null || x == "") {
          alert("Product must be selected");
          document.forms["frmorder"]["pid"].focus();
          //document.getElementById("prd").focus();
          return false;
      }
      if (y == null || y == "") {
          alert("Quantity must be filled out");
          document.forms["frmorder"]["quantity"].focus();
          //document.getElementById("qty").focus();
          return false;
      }
       
      return true;
  }
 
</script>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

     <script src="jsnav/jquery-3.3.1.min.js"></script>
    <script src="jsnav/popper.min.js"></script>
    <script src="jsnav/bootstrap.min.js"></script>
    <script src="jsnav/jquery.sticky.js"></script>
    <script src="jsnav/main.js"></script>

 <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable( {
        "lengthMenu": [
            [5,10,20,30, -1], 
          [5,10,20,30,"All"]
        ],
        "pagelength": 5,
        "dom": 'Blfrtip',
        "searching": true,
        "paging": true,
        "sorting": true,
        "order": [[1, 'asc']], // Sort the "Name" column ascendingly on load
        "columnDefs": [
          { targets: [2], searchable: false } // Exclude the "Price" column from searching
        ],
         buttons: [
            'excel', 'csv'
        ]

            } );
        } );
      </script>
 
 <br><br>
  <table width="100%">

  <tr>
    <td bgcolor="603A40" valign="bottom" style="font-family:monospace; color: white; font-size:15px;">
      <center>
        SoftBaseBall Store
      </center>
     </td>
  </tr>
</table>

</body>
</html>