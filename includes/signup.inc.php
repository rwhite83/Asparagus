<?php

include 'dbh.inc.php';

if(isset($_POST['submit'])){
	if (mysqli_real_escape_string($conn, $_POST['password']) == mysqli_real_escape_string($conn, $_POST['REpassword'])) {
		
    	$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
    	$pwd = mysqli_real_escape_string($conn, $_POST['password']);
    	
    	$sql_e = "SELECT * FROM user WHERE email = '$email'";
		$res_e = mysqli_query($conn, $sql_e);
		$sql_u = "SELECT * FROM user WHERE username = '$username'";
		$res_u = mysqli_query($conn, $sql_u);
		
		if ((mysqli_num_rows($res_e)) > 0) {
			$Message = urlencode('Sorry, that email already used!  Please try again.');
			header("location:../signup.php?Message=".$Message);
		} else if ((mysqli_num_rows($res_u)) > 0) {
			$Message = urlencode('Sorry, that username already used!  Please try again.');
			header("location:../signup.php?Message=".$Message);
		}
		
		else {

    		$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	    	$sql = "INSERT INTO user (username, pwd, email)" . " VALUES('$username', '$hashpwd', '$email')";

		    $res = mysqli_query($conn,$sql);
		    
            $Message = urlencode('Welcome to Asparagus!');
		    header("location:../index.php?Message=".$Message);
		}
		    
	}
	else {
		$Message = urlencode('Passwords do not match.  Try again!');
		header("location:../signup.php?Message=".$Message);
	}
	
}
else {
		header("location:../error-page1.php");
	}

?>