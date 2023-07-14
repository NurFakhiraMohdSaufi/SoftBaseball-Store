<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_staffs_a188791_pt2(fld_staff_num, fld_staff_name, fld_staff_phone, fld_staff_username, fld_staff_password, fld_staff_role) VALUES(:sid, :name, :phone, :usrname, :pwd, :role)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':usrname', $usrname, PDO::PARAM_STR);
    $stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $usrname = $_POST['usrname'];
    $pwd = $_POST['pwd'];
    $role = $_POST['role'];
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staffs_a188791_pt2 SET
      fld_staff_num = :sid, fld_staff_name = :name, fld_staff_phone = :phone, fld_staff_username = :usrname, fld_staff_password = :pwd, fld_staff_role = :role
      WHERE fld_staff_num = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':usrname', $usrname, PDO::PARAM_STR);
    $stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $usrname = $_POST['usrname'];
    $pwd = $_POST['pwd'];
    $role = $_POST['role'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a188791_pt2 where fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a188791_pt2 WHERE fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>