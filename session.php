<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "benM#059");
// Selecting Database
$db = mysql_select_db("brmwc6_4380", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from person where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];

$study_sql=mysql_query("select S.description from Study_arm_protocol S, Person_Study_arm_protocol S1, Person S2 where S2.username='$user_check' and S2.person_id=S1.person_id and S1.protocol_id=S.protocol_id;");
$row1 = mysql_fetch_assoc($study_sql);
$login_session1 =$row1['description'];

$test_sql=mysql_query("select S.protocol_id from Study_arm_protocol S, Person_Study_arm_protocol S1, Person S2 where S2.username='$user_check' and S2.person_id=S1.person_id and S1.protocol_id=S.protocol_id;");
$test_row = mysql_fetch_assoc($test_sql);
$test_session =$test_row['protocol_id'];

$_SESSION['protocol_id'] = $test_session;


if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>