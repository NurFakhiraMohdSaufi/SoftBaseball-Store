<?php
session_start();
  include_once 'products_crud.php';
?>


<?php
 
$brand = array
  (
  array("name"=>"Diamond","abb"=>"Diamond"),
  array("name"=>"Easton", "abb"=>"Easton"),
  array("name"=>"ISF", "abb"=>"ISF"),
  array("name"=>"JUGS", "abb"=>"JUGS"),
  array("name"=>"KIPSTA", "abb"=>"KIPSTA"),
  array("name"=>"Louisville", "abb"=>"Louisville"),
  array("name"=>"McGregor", "abb"=>"McGregor")
  // insert other universities here
  );
 
 ?>

 <?php
 
$color = array
  (
  array("name"=>"Black","abb"=>"Black"),
  array("name"=>"White", "abb"=>"White"),
  array("name"=>"Yellow", "abb"=>"Yellow"),
  array("name"=>"Blue", "abb"=>"Blue"),
  array("name"=>"Brown", "abb"=>"Brown"),
  array("name"=>"Mix", "abb"=>"Mix")
  // insert other universities here
  );
 
 ?>

 <?php
 
$category = array
  (
  array("name"=>"Bag","abb"=>"Bag"),
  array("name"=>"Bat","abb"=>"Bat"),
  array("name"=>"Ball","abb"=>"Ball"),
  array("name"=>"Helmet", "abb"=>"Helmet"),
  array("name"=>"Glove", "abb"=>"Glove"),
  array("name"=>"Face Guard", "abb"=>"Face Guard"),
  array("name"=>"Hitting Stick", "abb"=>"Hitting Stick"),
  array("name"=>"Throat Protecter", "abb"=>"Throat Protecter"),
  array("name"=>"Pitching Machine", "abb"=>"Pitching Machine"),
  array("name"=>"Baseball Set","abb"=>"Baseball Set"),
  array("name"=>"Softball Set","abb"=>"Softball Set")
  // insert other universities here
  );
 
 ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My SoftBaseBall Ordering System : Products</title>


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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
 <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
            <h2><center>Create New Products</center></h2>
          </div>
          
          <form action="products.php" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="productid" class="col-sm-3 control-label">Product ID</label>
              <div class="col-sm-9">
                <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required> 
              </div>
            </div>

            <div class="form-group">
              <label for="productname" class="col-sm-3 control-label" required>Name</label>
              <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="productname" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required> 
              </div>
            </div>

            <div class="form-group">
              <label for="productprice" class="col-sm-3 control-label">Price</label>
              <div class="col-sm-9">
                <input name="price" type="text" class="form-control" id="productprice" placeholder="Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required> 
              </div>
            </div>

            <div class="form-group">
              <label for="productbrand" class="col-sm-3 control-label">Brand</label>
              <div class="col-sm-9">
                <select name="brand" class="form-control" id="productbrand">
                <option value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_brand']; ?>" selected hidden><?php if(isset($_GET['edit'])) echo $editrow['fld_product_brand']; ?></option>
                <?php 
                foreach ($brand as $u){
                  echo "<option value='".$u['abb']."'>".$u['name']."</option>";
        } ?>
      </select>
              </div>
            </div>

            <div class="form-group">
              <label for="productcolor" class="col-sm-3 control-label">Color</label>
              <div class="col-sm-9">
                <select name="color" class="form-control" id="productcolor">
                <option value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_color']; ?>" selected required hidden><?php if(isset($_GET['edit'])) echo $editrow['fld_product_color']; ?></option>
                <?php 
                foreach ($color as $u){
                  echo "<option value='".$u['abb']."'>".$u['name']."</option>";
        } ?>
      </select>
              </div>
            </div>

            <div class="form-group">
              <label for="productcategory" class="col-sm-3 control-label">Category</label>
              <div class="col-sm-9">
                <select name="category" class="form-control" id="productcategory">
                <option value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_category']; ?>" selected required hidden><?php if(isset($_GET['edit'])) echo $editrow['fld_product_category']; ?></option>
                <?php 
                foreach ($category as $u){
                  echo "<option value='".$u['abb']."'>".$u['name']."</option>";
        } ?>
      </select>
              </div>
            </div>

            <div class="form-group">
              <label for="productquantity" class="col-sm-3 control-label" >Quantity</label>
              <div class="col-sm-9">
                <input name="quantity" type="text" class="form-control" id="productquantity" placeholder="Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>" min="0" required> 
              </div>
            </div>

            <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create" onclick="return validateUserRole()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
      </form>

        </div>
      </div>    


      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Products Lists</h2>
          </div>
          <table id= "datatable" class="table table-striped table-bordered font-button hover display">
            <thead>
          <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Brand</th>
            <th></th>
          </tr>
        </thead>

           <?php
           //pagination
           /*$per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;*/

      // Read
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
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>

        <td>
          <center>
          <button id="openBtn" type="button" data-toggle="modal" data-target="#myModal" data-href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>"  class="btn btn-warning btn-xs openBtn  button-29" role="button" style="color: white;">Details</button>

          <?php if(($_SESSION['fld_staff_role'] == "Admin")) { ?>

            
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs button-29" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs button-29" role="button">Delete</a>
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

     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog" role="document">
            <!-- Modal content -->
            <div class="modal-content" style="background-color: #BA90C6 ;">
              <div class="modal-header" style="font-family:viga, sans-serif; font-size:40px;">
                <h4>Product Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body" style="font-family:pangolin, sans-serif; font-size:16px; font-weight: bold;">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default font-button" data-dismiss="modal" >Close</button>
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


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>





    <script type="text/javascript">
      $(document).ready(function() {
        $('.openBtn').on('click', function(){
          var url = $(this).attr('data-href');
          $('.modal-body').load(url, function() {
            /* Act on the event */
            $('#myModal').modal({show:true});
          });
        });
      });

    </script>

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

       function validateUserRole() {
        if('<?php echo $_SESSION['fld_staff_role']; ?>' === "Non Admin") {
          alert('You do not have the right to perform this action.')
          return false;
        }

        return true;
       }

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

