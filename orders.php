<?php
session_start();
  include_once 'orders_crud.php';



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My SoftBaseBall Ordering System : Orders</title>
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
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
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
  
</head>
<body>
  <?php include_once 'nav_bar.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <br><br><br><br><br><br>
        <div class="page-header">
          <h2><center>Create New Order</center></h2>
        </div>
        <form action="orders.php" method="post" class="form-horizontal">

          <div class="form-group">
            <label for="orderid" class="col-sm-3 control-label">
              Order ID
            </label>
            <div class="col-sm-9">
              <input name="oid" type="text" readonly class="form-control" id="staffid" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_num']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="orderdate" class="col-sm-3 control-label">Order Date</label>
            <div class="col-sm-9">
              <input name="orderdate" type="text" readonly class="form-control" id="orderdate" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>" required>
            </div>            
          </div>

          <div class="form-group">
            <label for="staffname" class="col-sm-3 control-label">
              Staff Name
            </label>
            <div class="col-sm-9">
              <select name="sid" class="form-control" id="staffname" required>
              <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a188791_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
            }
            catch(PDOException $e){
                  echo "Error: " . $e->getMessage();
            }
            foreach($result as $staffrow) {
            ?>
              <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_num']==$staffrow['fld_staff_num'])) { ?>
                <option value="<?php echo $staffrow['fld_staff_num']; ?>" selected><?php echo $staffrow['fld_staff_name']?></option>
              <?php } else { ?>
                <option value="<?php echo $staffrow['fld_staff_num']; ?>"><?php echo $staffrow['fld_staff_name']?></option>
              <?php } ?>
            <?php
            } // while
            $conn = null;
            ?> 
            </select>
            </div>            
          </div>

          <div class="form-group">
            <label for="customername" class="col-sm-3">Customer Name</label>
            <div class="col-sm-9">
              <select name="cid" class="form-control" id="customername" required>
             <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tbl_customers_a188791_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
            }
            catch(PDOException $e){
                  echo "Error: " . $e->getMessage();
            }
            foreach($result as $custrow) {
            ?>
              <?php if((isset($_GET['edit'])) && ($editrow['fld_customer_num']==$custrow['fld_customer_num'])) { ?>
                <option value="<?php echo $custrow['fld_customer_num']; ?>" selected><?php echo $custrow['fld_customer_name']?></option>
              <?php } else { ?>
                <option value="<?php echo $custrow['fld_customer_num']; ?>"><?php echo $custrow['fld_customer_name']?></option><br>
              <?php } ?>
            <?php
            } // while
            $conn = null;
            ?> 
            </select><br>

            </div>
          </div>  

          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
      <button class="btn btn-default font-button" aria-hidden="true" type="submit" name="update">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true">Update</span>
      </button>

       <?php } else { ?>

      <button class="btn btn-default font-button" aria-hidden="true" type="submit" name="create" role="button">
        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
      </button>

      <?php } ?>
      <button class="btn btn-default font-button" aria-hidden="true" type="reset" ><span class="glyphicon glyphicon-erase" aria-hidden="true" >Clear</span></button>
    </div>
  </div>
    </form>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <h2>Order List</h2>
        </div>
        <table id="datatable" class="table table-striped table-bordered hover font-button" >
          <thead>
          <tr>
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Staff ID</th>
        <th>Customer ID</th>
        <th></th>
      </tr>
      </thead>

      <?php

       // pagination
      $per_page = 5;
      if(isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;


      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_orders_a188791, tbl_staffs_a188791_pt2, tbl_customers_a188791_pt2 WHERE ";
        $sql = $sql."tbl_orders_a188791.fld_staff_num = tbl_staffs_a188791_pt2.fld_staff_num and ";
        $sql = $sql."tbl_orders_a188791.fld_customer_num = tbl_customers_a188791_pt2.fld_customer_num";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr>
        <td><?php echo $orderrow['fld_order_num']; ?></td>
        <td><?php echo $orderrow['fld_order_date']; ?></td>
        <td><?php echo $orderrow['fld_staff_name'] ?></td>
        <td><?php echo $orderrow['fld_customer_name'] ?></td>
        <td>
          <center>
          <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-warning btn-xs button-29" role="button">Details</a>

          <?php if(($_SESSION['fld_staff_role'] === 'Admin')) { ?>
          <a href="orders.php?edit=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-success btn-xs button-29" role="button">Edit</a>
          
          <a href="orders.php?delete=<?php echo $orderrow['fld_order_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs button-29" role="button">Delete</a>
          </center>
        <?php } ?>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
        </table>
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

     <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

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