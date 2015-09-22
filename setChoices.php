<?PHP

//include('session.php');

session_start();

$protocol_id = $_SESSION['protocol_id'];
$survey_id = $_SESSION['survey_Number'];
$question_Number = $_SESSION['question_id'];

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		//===================================================
		//	GET THE QUESTION AND ANSWERS FROM THE FORM
		//===================================================

	$choice = $_POST['choice'];
	$label = $_POST['label'];
	$order = $_POST['order'];
	
	
	$choice  = htmlspecialchars($choice);
	$label  = htmlspecialchars($label);
	$order  = htmlspecialchars($order);
	



		//============================================
		//	OPEN A CONNECTION THE DATABASE
		//============================================
	$user_name = "root";
	$password = "benM#059";
	$database = "brmwc6_4380";
	$server = "localhost";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		//=============================================================
		//	SET A ROW IN THE answers TABLE, WITH THE SAME QID FIELD
		//=============================================================

		$SQL = "INSERT INTO Choice (question_id, value, label, choice_order) VALUES ('$question_Number', '$choice', '$label', '$order')";
		$result = mysql_query($SQL);


		mysql_close($db_handle);

		print "The choice has been added to the database";

	}
	else {
		print "Database NOT Found ";
		mysql_close($db_handle);
	}



}


?>
<?PHP
if (empty($_POST)) {
?>

<!--
	<html>
	<head>
	<title>Survey Admin Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>

	<FORM NAME ="form1" METHOD ="POST" ACTION ="setChoices.php">

	<p>

	Value: <INPUT TYPE = 'TEXT' Name ='choice'  value="" maxlength="20">
	Label: <INPUT TYPE = 'TEXT' NAME ='label' value="" maxlength="20">
	Order: <INPUT TYPE = 'TEXT' NAME ='order' value="" maxlength="20">


	<P align = center>
	<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Set this Choice">
	</P>

	<div>
	<b id="logout"><a href="logout.php">Log Out</a></b>
	</div>

	</FORM>

	<P>
	<?PHP print $errorMessage;?>

	</body>
	</html>
-->

<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Create Question Choices
                        </div>
                        <div class="panel-body">
                       <form action="" method="post">
  <div class="form-group">
    <label for="label">Choice</label>
    <input id="label" class="form-control" name="label" placeholder="Enter a Possible Question Response" />
  </div>
  <div class="form-group">
    <label for="choice">Choice Label</label>
    <input id="choice" class="form-control" name="choice" placeholder="Enter Choice Label" type="text" />
  </div>
  <div class="form-group">
    <label for="order">Choice Order</label>
    <input id="order" class="form-control" name="order" placeholder="Enter Position Number of Choice" type="text" />
  </div>
  <button type="submit" name="submit" class="btn btn-default">Create Choice</button>
  </form>
  <form action="logout.php">
	<button type="submit" name="submit3" class="btn btn-default">Log Out</button>
	</form>

<?PHP
}
else {
?>

<!--
	<html>
	<head>
	<title>Survey Admin Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>

	<P align = center>
	<a href="setChoices.php">
	<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Add another Choice">
	</a>
	<a href="setQuestion.php">
	<INPUT TYPE = "Submit" Name = "Submit2"  VALUE = "Add another Question">
	</a>
	<a href="protocol_survey.php">
	<INPUT TYPE = "Submit" Name = "Submit3"  VALUE = "Create another Survey">
	</a>
	</P>

	<div>
	<b id="logout"><a href="logout.php">Log Out</a></b>
	</div>

	

	<P>
	<?PHP print $errorMessage;?>

	</body>
	</html>
-->

<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Options
                        </div>
                        <div class="panel-body">
<form action="protocol_survey.php">
<button type="submit" name="submit1" class="btn btn-default">Create another Survey</button>
</form>
<form action="setQuestion.php">
<button type="submit" name="submit2" class="btn btn-default">Create another Question</button>
</form>
<form action="setChoices.php">
<button type="submit" name="submit3" class="btn btn-default">Create another Choice</button>
</form>
<form action="logout.php">
<button type="submit" name="submit4" class="btn btn-default">Log Out</button>
</form>	
<?PHP
}
?>