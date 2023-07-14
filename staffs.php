<?php
  session_start();
  include_once 'staffs_crud.php';

  if(($_SESSION['fld_staff_role'] === "Admin")) {
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My SoftBaseBall Ordering System : Staffs</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">  

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
          <h2><center>Create New Staff</center></h2>        
        </div>
        <form action="staffs.php" method="post" class="form-horizontal">

          <div class="form-group">
            <label for="staffid" class="col-sm-3 control-label">
              Staff ID
            </label>
            <div class="col-sm-9">
              <input name="sid" type="text" class="form-control" id="staffid" placeholder="S001" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>" required>
            </div>
          </div>
          

          <div class="form-group">
            <label for="staffname" class="col-sm-3 control-label">
              Name
            </label>
            <div class="col-sm-9">
              <input name="name" type="text" class="form-control" id="staffname" placeholder="Ali Bin Abu" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>"required>
            </div>
          </div>
          

          <div class="form-group">
            <label for="staffphone" class="col-sm-3 control-label">
              Phone Number
            </label>
            <div class="col-sm-9">
              <input name="phone" type="text" class="form-control" id="staffphone" placeholder="012-3456789" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="usrname" class="col-sm-3 control-label">
              Username
            </label>
            <div class="col-sm-9">
              <input name="usrname" type="text" class="form-control" id="usrname" placeholder="Username" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_username']; ?>" required>
            </div>
          </div>

            <div class="form-group">
            <label for="pwd" class="col-sm-3 control-label">
              Password
            </label>
            <div class="col-sm-9">
              <input style="width: 70%" name="pwd" type="password" class="form-control input-2" id="pwd" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required >
              <span toggle="#staffretypepassword" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showPassword()"></span>
            </div>
          </div>


           <div class="form-group">
            <label for="pwd" class="col-sm-3 control-label">
              Retype Password
            </label>
            <div class="col-sm-9">
              <input style="width: 70%" name="pwd" type="password" class="form-control input-2" id="retypepwd" placeholder="Retype Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required >
              <span toggle="#staffretypepassword" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showRetypePassword()"></span>
            </div>
          </div>

            <div class="form-group">
          <label for="staffrole" class="col-sm-3 control-label">Role</label>
          <div class="col-sm-9">
            <select name="role" class="form-control" id="fld_staff_role" required>
              <option value="Admin" <?php if(isset($_GET['edit']))
              if ($editrow['fld_staff_role'] == "Admin") echo "selected"; ?>>Admin</option>
              <option value="Non Admin" <?php if(isset($_GET['edit']))
              if ($editrow['fld_staff_role'] == "Non Admin") echo "selected"; ?>>Non Admin</option>
            </select>
          </div>
        </div>




          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <?php if (isset($_GET['edit'])) { ?>
              <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
              
              <button class="btn btn-default" type="submit" name="update">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true">Update</span>
              </button>

              <?php } else { ?>

              <button class="btn btn-default font-button" type="submit" name="create" onclick="return validate()" onsubmit="alert('Success!'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </button>

              <?php } ?>

              <button class="btn btn-default font-button" type="reset">
              <span class="glyphicon glyphicon-erase" aria-hidden="true">Clear</span>
            </button>
              </div>
              </div>
            </form>

      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <h2>Staff List</h2>
        </div>
        <table class="table table-striped table-bordered font-button">

          <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th></th>
          </tr>

          <?php
          // pagination
          $per_page = 5;
         if(isset($_GET["page"]))
          $page = $_GET["page"];
        else
          $page = 1;
        $start_from = ($page-1) * ($per_page);

          // Read
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
          foreach($result as $readrow) {
          ?>
          <tr>
            <td><?php echo $readrow['fld_staff_num']; ?></td>
            <td><?php echo $readrow['fld_staff_name']; ?></td>
            <td><?php echo $readrow['fld_staff_phone']; ?></td>
            <td><?php echo $readrow['fld_staff_role']; ?></td>
            <td>
              <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs button-29" role="button"  onclick="return validate()">Edit</a>

            <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs button-29" role="button">Delete</a>
            </td>
          </tr>
          <?php
          }
          $conn = null;
          ?>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
            <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a188791_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
            
          </ul>
        </nav>
        
      </div>
      
    </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="jslogin/jquery.min.js"></script>
  <script src="jslogin/popper.js"></script>
  <script src="jslogin/bootstrap.min.js"></script>
  <script src="jslogin/main.js"></script>
       <script src="jsnav/jquery-3.3.1.min.js"></script>
    <script src="jsnav/popper.min.js"></script>
    <script src="jsnav/bootstrap.min.js"></script>
    <script src="jsnav/jquery.sticky.js"></script>
    <script src="jsnav/main.js"></script>

      <script type="text/javascript">

      function showPassword() {
        var x = document.getElementById("pwd");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      function showRetypePassword() {
        var x = document.getElementById("retypepwd");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

          function validate() {
        var password = document.getElementById("pwd").value;
        var confirmpassword = document.getElementById("retypepwd").value;

        var name = document.getElementById("staffname").value;

        if (password != confirmpassword) {
          alert("Password do not match. Please retype it again.");
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
<?php } else {
  echo '<script>alert("You do not have the permission to access this page") </script>';
  echo '<script>window.location= "index.php"</script>';
  //header("Location: index.php");


} ?>