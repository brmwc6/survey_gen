<?php
include('session.php');
?>

<!--
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
</div>
<div>
<b id="Study">Your current Study Protocols: <i><a href="protocol_survey.php"><?php echo $login_session1; ?></a></i></b>
</div>
<div>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>
-->

<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Welcome </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Home Page
                        </div>
                        <div class="panel-body">
  <div class="form-group">
  	<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
  </div>
  <div class="form-group">
	<b id="Study">Your current Study Protocols: <i><a href="protocol_survey.php"><?php echo $login_session1; ?></a></i></b>
  </div>
   <form action="logout.php">
	<button type="submit" name="submit3" class="btn btn-default">Log Out</button>
	</form>