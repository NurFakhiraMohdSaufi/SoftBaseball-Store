<?php
session_start();
  include_once 'customers_crud.php';

  if(($_SESSION['fld_staff_role'] === "Admin")) {

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>My SoftBaseBall Ordering System : Customers</title>

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
            <h2><center>Create New Customer</center></h2>
          </div>

          <form action="customers.php" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="customerid" class="col-sm-3 control-label">Customer ID</label>
              <div class="col-sm-9">
                <input name="cid" type="text" class="form-control" id="customerid" placeholder="C001" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_num']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="customername" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="customername" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="customeraddress" class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <input name="address" type="text" class="form-control" id="customeraddress" placeholder="Address" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_address']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="customerphone" class="col-sm-3 control-label">Phone Number</label>
              <div class="col-sm-9">
                <input name="phone" type="text" class="form-control" id="customerphone" placeholder="Phone Number" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <?php if (isset($_GET['edit'])) { ?>
                <input type="hidden" name="oldcid" value="<?php echo $editrow['fld_customer_num']; ?>">
                
                <button class="btn btn-default" type="submit" name="update">
                <span class="glyphicon glyphicon-pencil">Update</span>
              </button>
                <?php } else { ?>

                <button class="btn btn-default font-button" type="submit" name="create">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </button>
                <?php } ?>
                <button class="btn btn-default font-button" type="reset">
                <span class="glyphicon glyphicon-erase">Clear</span>
              </button>
              </div>
            </div>
          </form>

        </div>      
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Customer List</h2>
          </div>
          <table id="datatable" class="table table-striped hover table-bordered font-button" >
            <thead>
        <tr>
          <th>Customer ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th></th>
        </tr>
        </thead>

        <?php
        //pagination
        $per_page = 5;
      if(isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a188791_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_customer_num']; ?></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_address']; ?></td>
        <td><?php echo $readrow['fld_customer_phone']; ?></td>
        <td>
          <center>
          <a href="customers.php?edit=<?php echo $readrow['fld_customer_num']; ?>" class="btn btn-success btn-xs button-29" role="button">Edit</a>
          <a href="customers.php?delete=<?php echo $readrow['fld_customer_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs button-29" role="button">Delete</a>
        </center>
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
<?php } else {
  echo '<script>alert("You do not have the permission to access this page") </script>';
  echo '<script>window.location= "index.php"</script>';
  //header("Location: index.php");

} ?>

