<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!--
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
</head>
<body>
<div id="main">
<h1>Survey Creation Login</h1>
<div class="form-group" id="login">
<label for="login">Login</label>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
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
                           Survey Creation
                        </div>
                        <div class="panel-body">
                       <form action="" method="post">
  <div class="form-group">
    <label for="user">User</label>
    <input id="name" class="form-control" name="username" placeholder="Enter username" />
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input id="password" class="form-control" name="password" placeholder="Password" type="password" />
  </div>
  <button type="submit" name="submit" class="btn btn-default">Log in</button>
  </form>