<!--
This is the primary index page for login and the home page.
-->

<!-- <?php include 'base.php'; ?> -->

<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>CS4380 Group 13 Project</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>  
<body>  
<div id="main">

<!-- 

<?php
unset($_SESSION['Study_id']);
unset($_SESSION['Study_name']);
unset($_SESSION['Arm_id']);
unset($_SESSION['Arm_name']);
unset($_SESSION['Protocol_id']);

var_dump($_SESSION);

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Email'])){
	
	$email = $_SESSION['Email'];
	
	$info = file_get_contents($api.'?action=person_info&email='.$email);
	$info = json_decode($info, true);
	$fname = $info["first_name"];
	$lname = $info["last_name"];
	
	if (!empty($info["error"])){
		echo "Error (" . $info['errno'] . "): " . $info['error'];
	}
	
	include 'home.php';
}
elseif(!empty($_POST['email']) && !empty($_POST['pword'])){
	// If login information is present, try to log them in.
	$email = $_POST['email'];
	$pword = $_POST['pword'];

	$info = file_get_contents($api.'?action=login&email='.$email.'&pword='.$pword);

	$info = json_decode($info, true);
	$pid = $info["person_id"];
	
	// If login is successful, set session info.
	if ($pid) {
		$_SESSION['LoggedIn'] = 1;
		$_SESSION['Email'] = $email;
		header("Location: index.php");
	}
	else {
		// If unsuccessful, show an error and show login screen.
		$login_error = 1;
		include 'login.php';
	}
}
else {
	//Send the user to the Login screen for the first time.
	$email = "";
	$pword = "";
	$login_error = 0;
	include 'login.php';
}
?>
-->


</div>
</body>
</html>