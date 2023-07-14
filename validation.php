<?php
session_start();
include "database.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$username = test_input(($_POST['username']));
	$password = test_input(($_POST['password']));

	if (empty($username)) {
		header("Location: login.php?error=Username is required");
	} else if (empty($password)){
		header("Location: login.php?error=Password is required");
	}else {
		
		
		$sql = "SELECT * FROM tbl_staffs_a188791_pt2 WHERE fld_staff_username = '$username' AND fld_staff_password ='$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['fld_staff_password'] === $password) {
				$_SESSION['fld_staff_name'] = $row['fld_staff_name'];
				$_SESSION['fld_staff_num'] = $row['fld_staff_num'];
				$_SESSION['fld_staff_role'] = $row['fld_staff_role'];
				$_SESSION['fld_staff_username'] = $row['fld_staff_username'];



				header("Location: index.php?login=success");

			} else {
				header("Location: login.php?error=Incorrect username or password");
			}
		} else {
			header("Location: login.php?error=Incorrect username or password");
		}

	}


} else{
	header("Location: login.php");
}